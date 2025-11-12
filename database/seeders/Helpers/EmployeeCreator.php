<?php

namespace Database\Seeders\Helpers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;

class EmployeeCreator
{
    public static function create($first, $last, $type)
    {
        $fullName = "$first $last";
        do {
            $username = 'user_' . Str::random(6);
        } while (User::where('username', $username)->exists());
        
        $email = Str::lower($first) . '.' . Str::lower($last) . '@eurocosmetic.test';

        // Crear usuario
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $fullName,
                'username' => $username,
                'email_verified_at' => now(),
                'password' => Hash::make('<8&in*ZnGBX/'),
                'role_id' => \App\Models\Role::where('name', 'Employee')->value('id'),
                'status' => 'active',
            ]
        );

        // Generar DNI único random
        $dni = str_pad(rand(10000000, 99999999), 8, '0', STR_PAD_LEFT);

        return Employee::create([
            'code' => 'EMP' . str_pad(Employee::count() + 1, 5, '0', STR_PAD_LEFT),
            'user_id' => $user->id,
            'dni' => $dni,
            'email' => $email,
            'phone' => '9' . rand(10000000, 99999999),
            'birth_date' => now()->subYears(rand(22, 45))->subDays(rand(0, 365)),
            'employee_type' => $type,
            'years_experience' => rand(0, 12),
            'status' => 'active',
            'hire_date' => now()->subYears(rand(0, 3))->subDays(rand(0, 200)),
        ]);
    }
}
