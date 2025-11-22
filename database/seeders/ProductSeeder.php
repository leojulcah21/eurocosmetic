<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;
use App\Models\ProductImage;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();

        $products = json_decode(file_get_contents(database_path('data/products.json')), true);

        $availableImages = collect(glob(public_path('img/products/*.{jpg,png,jpeg}'), GLOB_BRACE))
            ->map(function ($path) {
                return 'img/products/' . basename($path);
            })
            ->values()
            ->toArray();

        foreach ($products as $index => $product) {

            $category = $categories->where('id', $product['category_id'])->first();
            $warehouse = $warehouses->where('id', $product['warehouse_id'])->first();

            $createdProduct = Product::create([
                'code' => 'PRD' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'category_id' => $category->id,
                'name' => $product['name'],
                'short_description' => $product['short_description'],
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'warehouse_id' => $warehouse->id
            ]);

            // -----------------------------------------
            // INSERTAR IMÁGENES ALEATORIAS (2 a 5)
            // -----------------------------------------
            $numImages = rand(2, 5);

            // Escoger aleatoriamente sin repetir
            $selected = Arr::random($availableImages, $numImages);

            foreach ($selected as $key => $imagePath) {
                ProductImage::create([
                    'product_id' => $createdProduct->id,
                    'image_path' => $imagePath,
                    'is_main' => $key === 0
                ]);
            }
        }
    }
}
