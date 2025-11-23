<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentMp;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Client\Payment\PaymentClient;

class MercadoPagoController extends Controller
{
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

    public function procesarPago(Request $request)
    {
        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json(['error' => 'Orden no encontrada'], 404);
        }

        $client = new PaymentClient();

        $payment = $client->create([
            "transaction_amount" => $request->amount,
            "token" => $request->token,
            "installments" => $request->installments,
            "payment_method_id" => $request->payment_method_id,
            "payer" => ["email" => $request->email],
        ]);

        // Evitar duplicar pagos
        $paymentMp = PaymentMp::firstOrCreate(
            ['order_id' => $order->id, 'mp_transaction_id' => $payment->id],
            [
                'code' => 'MP-' . strtoupper(uniqid()),
                'amount' => $payment->transaction_amount,
                'payment_status' => $payment->status,
                'payment_method' => $payment->payment_method_id,
                'payment_date' => now(),
            ]
        );

        // Actualizar estado de orden
        if($payment->status === 'approved'){
            $order->current_status = 'approved';
        } elseif($payment->status === 'pending'){
            $order->current_status = 'pending_review';
        } else {
            $order->current_status = 'pending';
        }
        $order->save();

        // Registrar historial de estado
        $order->statusHistory()->create([
            'status' => $order->current_status,
            'employee_id' => null,
        ]);

        return response()->json([
            'status' => $payment->status,
            'payment_id' => $paymentMp->id
        ]);
    }

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

                    $order = $paymentMp->order;
                    if($payment->status === 'approved'){
                        $order->current_status = 'approved';
                    } elseif($payment->status === 'pending'){
                        $order->current_status = 'pending_review';
                    } else {
                        $order->current_status = 'pending';
                    }
                    $order->save();

                    // Registrar historial
                    $order->statusHistory()->create([
                        'status' => $order->current_status,
                        'employee_id' => null,
                    ]);
                }
            }
        }

        return response()->json(['ok' => true]);
    }
}
