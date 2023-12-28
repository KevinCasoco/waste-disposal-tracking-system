<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeding admin
        $admin = User::create([
            'first_name' => 'Andrei Kevin',
            'last_name' => 'Casoco',
            'email' => 'andreikevincasoco@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'status' => 'active',
            'number' => '',
        ]);

         // seeding admin
         $admin = User::create([
            'first_name' => 'Corey',
            'last_name' => 'Taylor',
            'email' => 'coreytaylor@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'status' => 'inactive',
            'number' => '',
        ]);
    }
}
