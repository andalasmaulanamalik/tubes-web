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
        // Admin User
        User::create([
            'name' => 'Jayusman',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'role' => 'admin',
        ]);

        // Manager User
        User::create([
            'name' => 'Malik Manager',
            'email' => 'manager1@example.com',
            'password' => Hash::make('password'), 
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Andalas Manager',
            'email' => 'manager2@example.com',
            'password' => Hash::make('password'), 
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Maulana Manager',
            'email' => 'manager3@example.com',
            'password' => Hash::make('password'), 
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Ibrahim Manager',
            'email' => 'manager4@example.com',
            'password' => Hash::make('password'), 
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Aper Manager',
            'email' => 'manager5@example.com',
            'password' => Hash::make('password'), 
            'role' => 'manager',
        ]);

        // Kasir User
        User::create([
            'name' => 'Malik Kasir',
            'email' => 'kasir@example.com',
            'password' => Hash::make('password'), 
            'role' => 'kasir',
        ]);

        // Supervisor User
        User::create([
            'name' => 'Malik SV',
            'email' => 'supervisor@example.com',
            'password' => Hash::make('password'), 
            'role' => 'supervisor',
        ]);

        // Gudan User
        User::create([
            'name' => 'Malik Gudang',
            'email' => 'gudang@example.com',
            'password' => Hash::make('password'), 
            'role' => 'gudang',
        ]);

        $admin = User::find(1); 
        $admin->assignRole('admin');

        $manager = User::find(2);
        $manager->assignRole('manager');

        $kasir = User::find(7);
        $kasir->assignRole('kasir');

        $supervisor = User::find(8);
        $supervisor->assignRole('supervisor');

        $gudang = User::find(9);
        $gudang->assignRole('gudang');
    }
}
