<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Jayusman',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Replace with a secure password
            'role' => 'admin',
        ]);

        // Create Manager User
        User::create([
            'name' => 'Manager Toko',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'), // Replace with a secure password
            'role' => 'manager',
        ]);

        // Create Kasir User
        User::create([
            'name' => 'Kasir Toko',
            'email' => 'kasir@example.com',
            'password' => Hash::make('password'), // Replace with a secure password
            'role' => 'kasir',
        ]);
    }
}
