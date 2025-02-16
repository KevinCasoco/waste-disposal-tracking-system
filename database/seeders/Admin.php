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
            'first_name' => 'Jason',
            'last_name' => 'Blame',
            'email' => 'test@gmail.com',
            'email_verified_at' => '2024-02-02 12:42:50',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'status' => 'active',
            'number' => '',
        ]);

         // seeding admin
         $admin = User::create([
            'first_name' => 'Waste',
            'last_name' => 'Disposal',
            'email' => 'wastedisposaltrackingsystem@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
            'status' => 'active',
            'number' => '',
        ]);
    }
}
