<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = json_decode(file_get_contents(database_path('data/warehouses.json')), true);

        foreach ($warehouses as $index => $warehouse) {
            Warehouse::create([
                'code' => 'AMC' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'name' => $warehouse['name'],
                'capacity' => rand(5, 1000)
            ]);
        }
    }
}
