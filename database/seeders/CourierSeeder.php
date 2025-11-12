<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Helpers\EmployeeCreator;
use Illuminate\Support\Str;
use App\Models\Courier;

class CourierSeeder extends Seeder
{
    public function run(): void
    {
        $couriers = [
            ['Luis', 'Vargas'],
            ['Marcos', 'Reyes'],
            ['Daniel', 'Soto'],
        ];

        foreach ($couriers as [$first, $last]) {
            $employee = EmployeeCreator::create($first, $last, 'courier');

            Courier::create([
                'code' => 'CRR'.str_pad(Courier::count() + 1, 5, '0', STR_PAD_LEFT),
                'employee_id' => $employee->id,
                'vehicle_type' => ['motorcycle', 'bicycle', 'car', 'on_foot'][rand(0, 3)],
                'driver_license' => 'LIC-' . rand(10000, 99999),
                'license_code' => 'A-' . rand(1, 3),
                'capacity' => rand(5, 50),
                'vehicle_plate' => strtoupper(Str::random(3)).'-'.rand(100,999),
                'availability_status' => 'available',
                'rating' => rand(450, 500) / 100,
            ]);
        }
    }
}
