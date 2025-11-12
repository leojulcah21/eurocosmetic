<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Helpers\EmployeeCreator;
use App\Models\WarehouseManager;
use App\Models\Warehouse;

class WarehouseManagerSeeder extends Seeder
{
    public function run(): void
    {
        $warehouses = Warehouse::all();
        if ($warehouses->isEmpty()) {
            $this->command->warn('⚠️ No warehouses found. Seed warehouses first.');
            return;
        }

        $managers = [
            ['Miguel', 'Palacios'],
            ['Rocío', 'Mendoza'],
        ];

        foreach ($managers as $index => [$first, $last]) {
            $employee = EmployeeCreator::create($first, $last, 'warehouse_manager');

            WarehouseManager::create([
                'code' => 'WHS'.str_pad(WarehouseManager::count() + 1, 5, '0', STR_PAD_LEFT),
                'employee_id' => $employee->id,
                'warehouse_id' => $warehouses[$index % $warehouses->count()]->id,
                'responsibility_area' => 'Almacén Central',
            ]);
        }
    }
}
