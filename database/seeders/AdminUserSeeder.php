<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
            'phone' => '08123456789',
            'role' => 'admin',
            'is_admin' => true,
        ]);

        // Buat user biasa untuk testing
        User::create([
            'name' => 'User Test',
            'email' => 'user@mail.com',
            'password' => Hash::make('user123'),
            'phone' => '08123456790',
            'role' => 'user',
            'is_admin' => false,
        ]);
    }
}
