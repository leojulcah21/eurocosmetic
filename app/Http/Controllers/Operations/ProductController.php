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
        return view('blog.orders.cart');
    }


    public function add(Request $request)
    {
        try {
            $product = Product::findOrFail($request->product_id);

            // Si quieres, guardas en sesión:
            $cart = session()->get('cart', []);
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => ($cart[$product->id]['qty'] ?? 0) + 1
            ];
            session()->put('cart', $cart);

            return response()->json([
                'message' => 'Producto añadido!',
                'cart' => $cart
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
