<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create super admin only if not exists
        User::firstOrCreate(
            ['email' => 'superadmin@yca.com'], // unique check
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('password'), // CHANGE later
                'role'     => 'super_admin',
            ]
        );
    }
}
