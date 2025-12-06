<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class OrderController extends Controller
{
    public function index()
    {
        // Traemos todas las órdenes con sus relaciones necesarias
        $orders = Order::with([
            'customer.user',    // Para mostrar nombre/email del cliente
            'items.product',    // Productos comprados
            'statusHistories'   // Historial de estados
        ])->orderBy('order_date', 'desc')->get();

        return view('company.customers.orders.index', compact('orders'));
    }

    // Método para actualizar estado de la orden
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,pending_review,approved,awaiting_warehouse,ready_for_delivery,on_delivery,delivered,cancelled'
        ]);

        $order->current_status = $request->status;
        $order->save();

        // Guardamos historial
        $order->statusHistories()->create([
            'status' => $request->status,
            'employee_id' => auth()->user()->employee?->id // si tu usuario tiene relación con employee
        ]);

        return back()->with('success', 'Estado de la orden actualizado.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Orden eliminada correctamente.');
    }
}
