<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

        for ($i = 1; $i <= 10; $i++) {
            // 1️⃣ Crear usuario
            $user = User::create([
                'name' => "Vendedor {$i}",
                'username' => "vendedor{$i}",
                'email' => "vendedor{$i}@correo.com",
                'password' => Hash::make('password123'),
                'role_id' => $roleId,
                'status' => 'active',
            ]);

            // 2️⃣ Crear empleado asociado
            $employee = Employee::create([
                'code' => 'EMP' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'user_id' => $user->id,
                'dni' => '1234567' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'email' => $user->email,
                'phone' => '98765432' . $i,
                'birth_date' => now()->subYears(rand(20, 40))->format('Y-m-d'),
                'employee_type' => 'seller',
            ]);

            // Verificamos que el empleado existe
            if (!$employee->exists) {
                dump("Empleado {$i} no se creó correctamente.");
                continue;
            }

            // 3️⃣ Crear vendedor
            $code = 'VND' . str_pad($i, 5, '0', STR_PAD_LEFT);

            Seller::create([
                'code' => $code,
                'employee_id' => $employee->id,
                'line' => 'Línea de ventas ' . $i,
                'notes' => 'Vendedor con experiencia en el rubro ' . $i,
                'years_experience' => rand(1, 10),
            ]);
        }
    }
}
