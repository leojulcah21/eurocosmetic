<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BotpressService;

class BotpressController extends Controller
{
    protected $botpress;

    public function __construct(BotpressService $botpress)
    {
        $this->botpress = $botpress;
    }

    /**
     * API para Botpress: buscar productos.
     */
    public function searchProducts(Request $request)
    {
        $request->validate([
            'query' => ['required', 'string'],
        ]);

        $query = $request->input('query');

        $products = $this->botpress->searchProducts($query);
        $products->load(['mainImage']);
        $result = $this->botpress->formatProductResponse($products);

        return response()->json($result);
    }
}
