<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Customer;
use App\Models\Role;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customerRole = Role::where('name', 'Customer')->first();
        $totalCustomers = 10;
        $usedCodes = [];

        // Obtenemos todos los IDs de distritos disponibles
        $districtIds = DB::table('districts')->pluck('id')->toArray();

        for ($i = 0; $i < $totalCustomers; $i++) {
            // Código único de cliente
            do {
                $code = rand(10000, 99999);
            } while (in_array($code, $usedCodes));

            $usedCodes[] = $code;

            // Username único
            do {
                $username = 'user_' . Str::random(6);
            } while (User::where('username', $username)->exists());

            // Crear usuario
            $user = User::create([
                'name' => fake()->name(),
                'username' => $username,
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role_id' => $customerRole->id,
                'status' => 'active',
            ]);

            // Crear cliente
            $customer = Customer::create([
                'user_id' => $user->id,
                'code' => $code,
                'dni' => fake()->unique()->numerify('########'),
                'phone' => fake()->unique()->phoneNumber(),
                'has_salon' => fake()->boolean(),
                'property_type' => fake()->randomElement(['owned', 'rented']),
                'business_name' => fake()->company(),
                'birth_date' => fake()->date(),
            ]);

            // Crear dirección asociada
            if (!empty($districtIds)) {
                Address::create([
                    'customer_id' => $customer->id,
                    'district_id' => fake()->randomElement($districtIds),
                    'alias' => fake()->name(),
                    'address_detail' => fake()->streetAddress(),
                    'reference' => fake()->sentence(3),
                    'is_primary' => true,
                ]);
            }
        }
    }
}
