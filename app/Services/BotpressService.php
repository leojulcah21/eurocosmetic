<?php

namespace App\Services;

use App\Models\Product;

class BotpressService
{
    /**
     * Busca productos por texto (nombre o código).
     */
    public function searchProducts(string $query)
    {
        $query = trim($query);

        if ($query === '') {
            return collect();
        }

        return Product::query()
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('code', 'LIKE', "%{$query}%")
            ->limit(5)
            ->get();
    }

    /**
     * Prepara respuesta para Botpress.
     */
    public function formatProductResponse($products)
    {
        if ($products->isEmpty()) {
            return [
                'found' => false,
                'products' => [],
                'message' => 'No encontré productos con ese nombre o código.'
            ];
        }

        return [
            'found' => true,
            'products' => $products->map(function ($p) {
                return [
                    'id' => $p->id,
                    'code' => $p->code,
                    'name' => $p->name,
                    'description' => $p->description,
                    'price' => $p->price,
                    'stock' => $p->stock,
                    'image' => $p->image_url,
                ];
            }),
            'message' => 'Productos encontrados.'
        ];
    }
}
