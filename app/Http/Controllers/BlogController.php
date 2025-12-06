<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $bestSellers = Product::with(['images' => function ($q) {
            $q->where('is_main', true);
        }])
        ->inRandomOrder()
        ->take(3)
        ->get();

        return view('welcome', compact('bestSellers'));
    }

    public function about() {
        return view('welcome');
    }
}
