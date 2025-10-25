<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            WarehouseSeeder::class,
            ProductSeeder::class,
            SellerSeeder::class,
            WarehouseManagerSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();

        $adminRole = Role::where('name', 'admin')->first();

        User::firstOrCreate(
            ['email' => 'admin@eurocosmetic.test'],
            [
                'name' => 'Administrator',
                'username' => 'admin123',
                'password' => Hash::make('E9nfI:MU6G-W'),
                'role_id' => $adminRole->id,
            ]
        );
    }
}
