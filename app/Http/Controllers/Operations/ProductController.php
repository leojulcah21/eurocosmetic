<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('company.inventory.products.index', compact('products'));
    }

    public function indexCustomer(Request $request)
    {
        $products = Product::with(['images' => function ($q) {
            $q->where('is_main', true);
        }])->paginate(20);

        if ($request->query('payment') === 'success') {
            // Vaciar carrito
            session()->forget('cart');
            session()->put('cart_count', 0);

            session()->flash('swal_success', '¡Compra realizada con éxito!');
        }

        return view('blog.products.index', compact('products'));
    }

    public function ordersCustomer()
    {
        $customer = Customer::where('user_id', Auth::id())->first();

        if (!$customer) {
            abort(404, 'Cliente no encontrado');
        }


        $orders = Order::with(['items.product', 'statusHistory', 'customer.user'])
        ->where('customer_id', $customer->id)
        ->orderBy('order_date', 'desc')
        ->get();

        return view('blog.orders.index', compact('orders'));
    }

    public function indexCart()
    {
        $cart = session()->get('cart', []);
        return view('blog.orders.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $id = $request->product_id;

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Ya existe → aumentar cantidad
            $cart[$id]['quantity'] += 1;
        } else {
            // Agregar nuevo
            $product = Product::find($id);

            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'category' => $product->category->name ?? '',
                'short_description' => $product->short_description,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        // Actualizar contador (suma total de items)
        $cartCount = collect($cart)->sum('quantity');
        session()->put('cart_count', $cartCount);

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount,
            'quantity' => $cart[$id]['quantity']
        ]);
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);

        // Evitar errores si el carrito queda vacío
        $cartCount = array_sum(array_column($cart, 'quantity') ?: [0]);
        session()->put('cart_count', $cartCount);

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount
        ]);
    }
}
