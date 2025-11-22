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
        $categories = json_decode(file_get_contents(database_path('data/categories.json')), true);

        foreach ($categories as $index => $category) {
            Category::create([
                'code' => 'CTG' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'name' => $category['name'],
                'description' => $category['description'],
            ]);
        }
    }
}
