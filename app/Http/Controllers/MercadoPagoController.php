<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;

use App\Models\Product;
use App\Models\Order;
use App\Models\MpReference;
use App\Models\Customer;
use App\Models\PaymentMp;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        MercadoPagoConfig::setAccessToken(env('MP_ACCESS_TOKEN'));
    }

    /* =========================================================
       1. CREAR PREFERENCIA (CART CHECKOUT)
    ========================================================= */
    public function createPreference(Request $request)
    {
        try {
            $cart = $request->cart;
            if (!$cart || count($cart) === 0) {
                return response()->json(['error' => 'Carrito vacío'], 400);
            }

            $items = [];
            $total = 0;

            foreach ($cart as $item) {
                $product = Product::find($item['id']);
                if (!$product) {
                    Log::warning('Producto no encontrado en carrito', ['product_id' => $item['id']]);
                    continue;
                }

                $items[] = [
                    'title' => $product->name,
                    'quantity' => (int) $item['quantity'],
                    'unit_price' => (float) $product->price
                ];

                $total += $product->price * $item['quantity'];
            }

            /* -------------------------------------------------
               Crear external_reference y guardarlo en BD
            ------------------------------------------------- */
            $externalRef = uniqid('order_');

            MpReference::create([
                'external_reference' => $externalRef,
                'user_id' => Auth::id(),
                'cart' => $cart,
                'amount' => $total, // <-- ESTE ES EL QUE FALTA
                'status' => 'pending', // solo si tu tabla lo exige
            ]);


            $client = new PreferenceClient();
            $preference = $client->create([
                "items" => $items,
                "notification_url" => route('mp.webhook'),
                "back_urls" => [
                    "success" => route('products', ['payment' => 'success']),
                    "failure"  => route('home'),
                    "pending"  => route('home'),
                ],
                "auto_return" => "approved",
                "payment_methods" => [
                    "excluded_payment_types" => [],
                    "installments" => 12,
                ],
                "metadata" => [
                    "user_id" => (string) Auth::id(),
                    "cart" => json_encode($cart),
                ],
                "external_reference" => $externalRef
            ]);

            Log::info('Preferencia creada', [
                'preference_id' => $preference->id,
                'amount' => $total,
                'user_id' => Auth::id(),
                'external_reference' => $externalRef
            ]);

            return response()->json([
                'preference_id' => $preference->id,
                'amount' => $total
            ]);
        } catch (\Exception $e) {

            Log::error('Error al crear preferencia', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['error' => 'Error interno'], 500);
        }
    }

    /* =========================================================
       2. PROCESAR PAGO (PAYMENT BRICKS)
    ========================================================= */
    public function processPayment(Request $request)
    {
        $formData = $request->input('formData');

        Log::info('Solicitud recibida en processPayment', [
            'payload' => $request->all()
        ]);

        $externalRef = uniqid('pay_');

        /* Guardar referencia del pago */
        MpReference::create([
            'external_reference' => $externalRef,
            'user_id' => $request->input('user_id'),
            'cart' => $request->input('cart'),
            'amount' => $formData['transaction_amount'],
            'status' => 'pending',
        ]);

        try {
            // ----------------------------
            // SANDBOX AUTOMÁTICO
            // ----------------------------
            if (env('MP_SANDBOX', true)) {
                $formData['payer']['first_name'] = 'APRO';
                $formData['payer']['last_name']  = 'APRO';
                $formData['payer']['identification'] = [
                    'type' => 'DNI',
                    'number' => '12345678',
                ];

                if (isset($formData['card'])) {
                    $formData['card']['security_code'] = '123';
                }
            }

            $client = new PaymentClient();

            $payment = $client->create([
                "transaction_amount" => $formData['transaction_amount'],
                "token" => $formData['token'],
                "installments" => $formData['installments'],
                "payment_method_id" => $formData['payment_method_id'],
                "issuer_id" => $formData['issuer_id'] ?? null,
                "payer" => [
                    "email" => $formData['payer']['email'] ?? 'sandbox@example.com',
                    "first_name" => $formData['payer']['first_name'],
                    "last_name" => $formData['payer']['last_name'],
                    "identification" => $formData['payer']['identification']
                ],
                "metadata" => [
                    "user_id" => (string) $request->input('user_id'),
                    "cart" => json_encode($request->input('cart')),
                ],
                "external_reference" => $externalRef,
                "notification_url" => route('mp.webhook'),
            ]);

            Log::info('Respuesta MercadoPago', [
                'payment_id' => $payment->id ?? null,
                'status' => $payment->status ?? null,
                'status_detail' => $payment->status_detail ?? null,
                'external_reference' => $externalRef,
                'full_response' => $payment
            ]);

            return response()->json($payment);

        } catch (\Exception $e) {
            Log::error('Error procesando pago con MercadoPago', [
                'error' => $e->getMessage(),
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /* =========================================================
       3. WEBHOOK OFICIAL
    ========================================================= */
    public function handle(Request $request)
    {
        Log::info("Webhook recibido", [
            'body' => $request->all(),
            'headers' => $request->headers->all()
        ]);

        $paymentId = $request->input('data.id')
            ?? ($request->input('data')['id'] ?? null);

        if (!$paymentId) {
            Log::warning("Webhook sin payment ID");
            return response()->json(['error' => 'Sin payment ID'], 400);
        }

        try {
            $client = new PaymentClient();
            $payment = $client->get($paymentId);

            Log::info("Pago consultado en webhook", [
                'payment_id' => $paymentId,
                'status' => $payment->status,
                'amount' => $payment->transaction_amount,
                'metadata' => $payment->metadata,
                'external_reference' => $payment->external_reference
            ]);

            /* -------------------------------------------------
                MAPEO DE ESTADOS MERCADOPAGO → TU BD
            ------------------------------------------------- */
            $mapEstados = [
                'approved'     => 'approved',
                'pending'      => 'pending',
                'in_process'   => 'pending_review',
                'rejected'     => 'cancelled',
                'cancelled'    => 'cancelled',
            ];

            $estadoBD = $mapEstados[$payment->status] ?? 'pending';

            // Si no está aprobado, igual respondemos OK
            if ($payment->status !== "approved") {
                return response()->json(['ok' => true]);
            }

            /* -------------------------------------------------
                1. Intentamos metadata
            ------------------------------------------------- */
            $metadata = $payment->metadata ?? null;

            if ($metadata && isset($metadata->cart) && isset($metadata->user_id)) {
                $cart = json_decode($metadata->cart, true);
                $userId = $metadata->user_id;
            } else {
                /* -------------------------------------------------
                    2. Fallback con external_reference
                ------------------------------------------------- */
                $externalRef = $payment->external_reference;

                $ref = MpReference::where('external_reference', $externalRef)->first();

                if (!$ref) {
                    Log::error("No se encontró referencia en BD", [
                        'external_reference' => $externalRef
                    ]);

                    return response()->json(['error' => 'Metadata incompleta y no existe referencia'], 500);
                }

                Log::warning("Metadata incompleta. Usando BD", [
                    'external_reference' => $externalRef
                ]);

                $cart = $ref->cart;
                $userId = $ref->user_id;
            }

            /* -------------------------------------------------
                Crear orden (MODO PERFECTO)
            ------------------------------------------------- */
            $total = $payment->transaction_amount;

            // Buscar al customer que corresponde al usuario
            $customer = Customer::where('user_id', $userId)->first();

            if (!$customer) {
                Log::error("No existe customer para user_id", ['user_id' => $userId]);
                return response()->json(['error' => 'Cliente no encontrado'], 500);
            }


            $order = Order::create([
                'customer_id'   => $customer->id,
                'code'          => strtoupper(uniqid()),
                'total_amount'  => $total,
                'current_status'=> $estadoBD,
            ]);

            foreach ($cart as $item) {
                $product = Product::find($item['id']);
                if (!$product) continue;

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity'   => $item['quantity'],
                    'unit_price' => $product->price,
                ]);
            }

            $order->statusHistory()->create([
                'status'      => $estadoBD,
                'employee_id' => null,
            ]);

            Log::info("Orden creada por webhook", [
                'order_id' => $order->id,
                'payment_id' => $payment->id,
                'estado_bd' => $estadoBD
            ]);

            PaymentMp::create([
                'code'              => 'PAY-' . strtoupper(uniqid()),
                'order_id'          => $order->id,
                'mp_transaction_id' => $payment->id,
                'amount'            => $payment->transaction_amount,
                'payment_date'      => $payment->date_approved,
                'payment_status'    => $payment->status,
                'payment_method'    => $payment->payment_method_id ?? 'unknown',
            ]);

            Log::info("Orden creada por webhook", [
                'order_id' => $order->id,
                'payment_id' => $payment->id,
                'estado_bd' => $estadoBD
            ]);

            return response()->json(['ok' => true]);

        } catch (\Exception $e) {

            $raw = null;

            if (is_callable([$e, 'getData'])) {
                try { $raw = $e->getData(); }
                catch (\Throwable $t) { $raw = 'No se pudo obtener getData()'; }
            }

            Log::error("Error consultando pago en MP", [
                'payment_id'    => $paymentId ?? null,
                'exception_msg' => $e->getMessage(),
                'raw_response'  => $raw,
                'trace'         => $e->getTraceAsString()
            ]);

            return response()->json([
                'error' => 'Api error. Check logs for details'
            ], 500);
        }
    }

    public function availableMethods(Request $request)
    {
        $site = $request->get('site', 'PE'); // por defecto Perú
        $token = env('MP_ACCESS_TOKEN');

        $res = \Illuminate\Support\Facades\Http::withToken($token)
            ->get('https://api.mercadopago.com/v1/payment_methods', ['site_id' => $site]);

        if (!$res->ok()) {
            return response()->json(['error' => 'No se pudo obtener métodos de MP'], 500);
        }

        $methods = collect($res->json());

        $yape = $methods->first(fn($m) =>
            (isset($m['name']) && str_contains(strtolower($m['name']), 'yape'))
            || (isset($m['id']) && str_contains(strtolower($m['id']), 'yape'))
        ) ? true : false;

        $bank_transfer = $methods->contains(fn($m) => ($m['payment_type_id'] ?? '') === 'bank_transfer');

        $digital_wallets = $methods->filter(fn($m) => ($m['payment_type_id'] ?? '') === 'digital_wallet')->values();

        return response()->json([
            'yape' => $yape,
            'bank_transfer' => $bank_transfer,
            'digital_wallets' => $digital_wallets,
            'raw' => $methods->values(),
        ]);
    }
}
