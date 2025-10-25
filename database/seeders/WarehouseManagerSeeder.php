<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\WarehouseManager;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WarehouseManagerSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        WarehouseManager::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roleId = \App\Models\Role::where('name', 'warehouse_manager')->value('id') ??
                  \App\Models\Role::where('name', 'employee')->value('id') ??
                  1;

        // Lista de nombres personalizados para los jefes de almacén
        $names = [
            ['first' => 'Miguel', 'last' => 'Palacios'],
            ['first' => 'Rocío', 'last' => 'Mendoza'],
            ['first' => 'Eduardo', 'last' => 'Torres'],
        ];

        $usedDnis = Employee::pluck('dni')->toArray();
        $usedPhones = Employee::pluck('phone')->toArray();

        // Obtenemos almacenes ya creados
        $warehouses = Warehouse::all();
        if ($warehouses->isEmpty()) {
            $this->command->warn('⚠️ No hay almacenes registrados. Ejecuta WarehouseSeeder antes de este.');
            return;
        }

        // Calculamos la secuencia de empleados
        $lastEmployee = Employee::orderBy('id', 'desc')->first();
        $employeeCount = $lastEmployee ? $lastEmployee->id : 0;

        foreach ($names as $index => $person) {
            $fullName = "{$person['first']} {$person['last']}";
            $username = Str::lower(Str::slug($person['first'] . $person['last']));
            $email = Str::lower($person['first']) . '.' . Str::lower($person['last']) . '@eurocosmetic.test';

            // Generar DNI único
            do {
                $dni = str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);
            } while (in_array($dni, $usedDnis));
            $usedDnis[] = $dni;

            // Generar teléfono único
            do {
                $phone = '9' . rand(10000000, 99999999);
            } while (in_array($phone, $usedPhones));
            $usedPhones[] = $phone;

            // Crear usuario
            $user = User::create([
                'name' => $fullName,
                'username' => $username,
                'email' => $email,
                'password' => Hash::make('password123'),
                'role_id' => $roleId,
                'status' => 'active',
            ]);

            // Crear empleado
            $employeeCode = 'EMP' . str_pad($employeeCount + $index + 1, 5, '0', STR_PAD_LEFT);

            $employee = Employee::create([
                'code' => $employeeCode,
                'user_id' => $user->id,
                'dni' => $dni,
                'email' => $user->email,
                'phone' => $phone,
                'birth_date' => now()->subYears(rand(28, 45))->subDays(rand(0, 365))->format('Y-m-d'),
                'employee_type' => 'warehouse_manager',
            ]);

            // Asignar un almacén existente (rotativo)
            $warehouse = $warehouses[$index % $warehouses->count()];

            // Crear jefe de almacén
            WarehouseManager::create([
                'code' => 'WHS' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'employee_id' => $employee->id,
                'warehouse_id' => $warehouse->id,
                'area' => $warehouse->name,
                'years_experience' => rand(3, 15),
                'notes' => "Jefe encargado del {$warehouse->name}, especializado en gestión logística.",
            ]);
        }
    }
}
