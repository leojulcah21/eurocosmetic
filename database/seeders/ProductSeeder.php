<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warehouse;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $warehouses = Warehouse::all();

        $products = [
            ['name' => 'Shampoo Hidratante', 'category' => 'Shampoo', 'description' => 'Shampoo con aloe vera y keratina', 'price' => 25.50, 'stock' => 150],
            ['name' => 'Acondicionador Suavizante', 'category' => 'Acondicionador', 'description' => 'Ideal para cabello seco', 'price' => 22.00, 'stock' => 120],
            ['name' => 'Mascarilla Capilar', 'category' => 'Tratamientos', 'description' => 'Reparación intensiva', 'price' => 30.00, 'stock' => 80],
            ['name' => 'Tinte Chocolate', 'category' => 'Coloración', 'description' => 'Color intenso y duradero', 'price' => 18.75, 'stock' => 200],
            ['name' => 'Spray Fijador', 'category' => 'Estilizado', 'description' => 'Fijación extra fuerte', 'price' => 15.90, 'stock' => 160],
        ];

        foreach ($products as $index => $product) {
            $category = $categories->where('name', $product['category'])->first();
            $warehouse = $warehouses->random();

            Product::create([
                'code' => 'PRD' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'category_id' => $category->id,
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'warehouse_id' => $warehouse->id,
                'image_url' => 'img/default-product.png',
            ]);
        }
    }
}
