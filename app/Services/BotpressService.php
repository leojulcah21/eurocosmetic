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
        // 1. Normalizamos el texto
        $query = strtolower(trim($query));

        if ($query === '') {
            return collect();
        }

        // 2. Palabras que no aportan (stopwords)
        $stopwords = [
            'el','la','los','las','un','una','unos','unas',
            'para','por','de','del','al','a',
            'mi','quiero','deseo','busco','necesito','producto','productos',
            'algún', 'algun', 'algunos'
        ];

        // 3. Convertimos la frase completa en tokens
        $tokens = preg_split('/\s+/', $query);

        // 4. Limpiar tokens → quitar stopwords y palabras muy cortas
        $tokens = array_filter($tokens, function ($t) use ($stopwords) {
            return strlen($t) > 2 && !in_array($t, $stopwords);
        });

        // Si luego de limpiar no queda nada → no hay criterio verdadero
        if (empty($tokens)) {
            return collect();
        }

        // 5. BÚSQUEDA INTELIGENTE
        return Product::query()
            ->where(function ($q) use ($tokens) {
                foreach ($tokens as $word) {
                    $q->orWhere('name', 'LIKE', "%{$word}%");
                }
            })
            ->orWhereHas('category', function ($cat) use ($tokens) {
                foreach ($tokens as $word) {
                    $cat->where('name', 'LIKE', "%{$word}%");
                }
            })
            ->orWhere(function ($q) use ($tokens) {
                foreach ($tokens as $word) {
                    $q->orWhere('code', 'LIKE', "%{$word}%");
                }
            })
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
                    'main_image' => optional($p->mainImage)->image_path,

                ];
            }),
            'message' => 'Productos encontrados.'
        ];
    }
}
