<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMp;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Client\Payment\PaymentClient;

class MercadoPagoController extends Controller
{
    // Crear preferencia para Bricks
    public function crearPreferencia(Order $order)
    {
        $client = new PreferenceClient();

        $preference = $client->create([
            'items' => [
                [
                    'title' => 'Orden #' . $order->code,
                    'quantity' => 1,
                    'unit_price' => $order->total_amount,
                ]
            ],
            'payment_methods' => [
                'installments' => 12,
            ],
            'notification_url' => route('mp.webhook'),
        ]);

        return response()->json([
            'preference_id' => $preference->id,
            'amount' => $order->total_amount
        ]);
    }

    // Procesar pago desde Bricks
    public function procesarPago(Request $request)
    {
        $client = new PaymentClient();

        $payment = $client->create([
            "transaction_amount" => $request->amount,
            "token" => $request->token,
            "installments" => $request->installments,
            "payment_method_id" => $request->payment_method_id,
            "payer" => [
                "email" => $request->email,
            ],
        ]);

        // Guardar pago en la base de datos
        $order = Order::find($request->order_id);

        $paymentMp = PaymentMp::create([
            'code' => 'MP-' . strtoupper(uniqid()),
            'order_id' => $order->id,
            'mp_transaction_id' => $payment->id,
            'amount' => $payment->transaction_amount,
            'payment_status' => $payment->status,
            'payment_method' => $payment->payment_method_id,
            'payment_date' => now(),
        ]);

        // Actualizar estado de la orden según pago
        if($payment->status === 'approved'){
            $order->current_status = 'approved';
        } elseif($payment->status === 'pending'){
            $order->current_status = 'pending_review';
        } else {
            $order->current_status = 'pending';
        }
        $order->save();

        return response()->json([
            'status' => $payment->status,
            'payment_id' => $paymentMp->id
        ]);
    }

    // Webhook de Mercado Pago
    public function webhook(Request $request)
    {
        $data = $request->all();

        if (($data['type'] ?? null) === 'payment') {
            $paymentId = $data['data']['id'] ?? null;

            if ($paymentId) {
                $client = new PaymentClient();
                $payment = $client->get($paymentId);

                $paymentMp = PaymentMp::where('mp_transaction_id', $payment->id)->first();
                if($paymentMp){
                    $paymentMp->payment_status = $payment->status;
                    $paymentMp->save();

                    // Actualizar orden
                    $order = $paymentMp->order;
                    if($payment->status === 'approved'){
                        $order->current_status = 'approved';
                    } elseif($payment->status === 'pending'){
                        $order->current_status = 'pending_review';
                    } else {
                        $order->current_status = 'pending';
                    }
                    $order->save();
                }
            }
        }

        return response()->json(['ok' => true]);
    }
}
