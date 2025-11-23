<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    public function crearOrdenDesdeCarrito(Request $request)
    {
        $cart = $request->cart;

        if (!$cart || count($cart) === 0) {
            return response()->json(['error' => 'Carrito vacío'], 400);
        }

        $customerId = auth()->id();

        // Evitar duplicados: si ya hay una orden pendiente
        $existingOrder = Order::where('customer_id', $customerId)
            ->where('current_status', 'pending')
            ->first();

        if ($existingOrder) {
            return response()->json([
                'order_id' => $existingOrder->id,
                'total_amount' => $existingOrder->total_amount
            ]);
        }

        // Calcular total
        $total = collect($cart)->sum(function($item){
            $product = Product::find($item['product_id']);
            return $product ? $product->price * $item['quantity'] : 0;
        });

        // Crear orden
        $order = Order::create([
            'customer_id' => $customerId,
            'code' => strtoupper(uniqid()),
            'total_amount' => $total,
            'current_status' => 'pending',
        ]);

        // Crear items
        foreach($cart as $item){
            $product = Product::find($item['product_id']);
            if ($product) {
                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                ]);
            }
        }

        // Registrar historial de estado
        $order->statusHistory()->create([
            'status' => $order->current_status,
            'employee_id' => null,
        ]);

        return response()->json([
            'order_id' => $order->id,
            'total_amount' => $order->total_amount
        ]);
    }
}
