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
        $warehouses = [
            ['name' => 'Almacén Central', 'capacity' => 5000],
            ['name' => 'Almacén Norte', 'capacity' => 3000],
            ['name' => 'Almacén Sur', 'capacity' => 2500],
        ];

        foreach ($warehouses as $index => $warehouse) {
            Warehouse::create([
                'code' => 'AMC' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'name' => $warehouse['name'],
                'capacity' => $warehouse['capacity'],
            ]);
        }
    }
}
