<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Shampoo', 'description' => 'Productos para limpieza capilar'],
            ['name' => 'Acondicionador', 'description' => 'Productos para suavizar el cabello'],
            ['name' => 'Tratamientos', 'description' => 'Mascarillas y aceites capilares'],
            ['name' => 'Coloración', 'description' => 'Tinturas y decolorantes'],
            ['name' => 'Estilizado', 'description' => 'Geles, ceras y sprays para peinado'],
        ];

        foreach ($categories as $index => $category) {
            Category::create([
                'code' => 'CTG' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'name' => $category['name'],
                'description' => $category['description'],
            ]);
        }
    }
}
