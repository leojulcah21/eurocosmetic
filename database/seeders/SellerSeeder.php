<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Seeder;
use Database\Seeders\Helpers\EmployeeCreator;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        $sellers = [
            ['Lucía', 'Ramírez', 'Eurocos'],
            ['Carlos', 'Fernández', 'Eurocos'],
            ['Valeria', 'Morales', 'Eurocos'],
        ];

        foreach ($sellers as [$first, $last, $line]) {
            $employee = EmployeeCreator::create($first, $last, 'seller');

            Seller::create([
                'code' => 'VND'.str_pad(Seller::count() + 1, 5, '0', STR_PAD_LEFT),
                'employee_id' => $employee->id,
                'line' => $line,
                'sales_target' => rand(5000, 20000),
            ]);
        }
    }
}
