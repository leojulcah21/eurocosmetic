<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RoleSeeder::class); // primero se crean los roles

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
