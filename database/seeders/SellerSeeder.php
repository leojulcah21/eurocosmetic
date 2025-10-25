<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SellerSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Seller::truncate();
        Employee::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roleId = \App\Models\Role::where('name', 'seller')->value('id') ??
                  \App\Models\Role::where('name', 'employee')->value('id') ??
                  1;

        // Listado de nombres reales simulados
        $names = [
            ['first' => 'Lucía', 'last' => 'Ramírez'],
            ['first' => 'Carlos', 'last' => 'Fernández'],
            ['first' => 'Valeria', 'last' => 'Morales'],
            ['first' => 'Diego', 'last' => 'Castro'],
            ['first' => 'Mónica', 'last' => 'Salazar'],
            ['first' => 'Javier', 'last' => 'Pérez'],
            ['first' => 'Daniela', 'last' => 'Cárdenas'],
            ['first' => 'Andrés', 'last' => 'Gonzales'],
        ];

        $usedDnis = [];
        $usedPhones = [];

        for ($i = 0; $i < count($names); $i++) {
            $fullName = "{$names[$i]['first']} {$names[$i]['last']}";
            $username = Str::lower($names[$i]['first']) . $i;
            $email = Str::lower($names[$i]['first']) . '.' . Str::lower($names[$i]['last']) . '@eurocosmetic.test';

            // Generar DNI único de 8 dígitos
            do {
                $dni = str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);
            } while (in_array($dni, $usedDnis));
            $usedDnis[] = $dni;

            // Generar teléfono único (9 + 8 dígitos)
            do {
                $phone = '9' . rand(10000000, 99999999);
            } while (in_array($phone, $usedPhones));
            $usedPhones[] = $phone;

            // 1️⃣ Crear usuario
            $user = User::create([
                'name' => $fullName,
                'username' => $username,
                'email' => $email,
                'password' => Hash::make('password123'),
                'role_id' => $roleId,
                'status' => 'active',
            ]);

            // 2️⃣ Crear empleado asociado
            $employee = Employee::create([
                'code' => 'EMP' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
                'user_id' => $user->id,
                'dni' => $dni,
                'email' => $user->email,
                'phone' => $phone,
                'birth_date' => now()->subYears(rand(23, 40))->subDays(rand(0, 365))->format('Y-m-d'),
                'employee_type' => 'seller',
            ]);

            // 3️⃣ Crear vendedor
            Seller::create([
                'code' => 'VND' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
                'employee_id' => $employee->id,
                'line' => 'Eurocos',
                'notes' => "Vendedor especializado en productos capilares premium.",
                'years_experience' => rand(1, 12),
            ]);
        }
    }
}
