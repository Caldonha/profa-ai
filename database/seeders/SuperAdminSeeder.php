<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('Admin'),
                'role' => 'superadmin',
            ]);
        } else {
            $user = User::where('email', 'admin@admin.com')->first();
            $user->role = 'superadmin';
            $user->password = Hash::make('Admin');
            $user->save();
        }
    }
} 