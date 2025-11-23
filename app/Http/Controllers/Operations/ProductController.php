<?php

namespace App\Http\Controllers\Operations;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('company.inventory.products.index', compact('products'));
    }

    public function indexCustomer()
    {
        $products = Product::with(['images' => function ($q) {
            $q->where('is_main', true);
        }])->paginate(20);

        return view('welcome', compact('products'));
    }

    public function indexCart()
    {
        $cart = session()->get('cart', []);
        return view('blog.orders.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $product = Product::find($productId);
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        // Contador total
        $cartCount = array_sum(array_column($cart, 'quantity'));
        session()->put('cart_count', $cartCount);

        return response()->json([
            'success' => true,
            'cart_count' => $cartCount
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
