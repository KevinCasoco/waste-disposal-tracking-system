<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Collector extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeding collector
        $collector = User::create([
            'plate_no' => '2KZ2L7C',
            'first_name' => 'Jay-Ar',
            'last_name' => 'Grifaldea',
            'email' => 'jayargrifaldea@gmail.com',
            'email_verified_at' => '2024-02-02 12:42:50',
            'password' => Hash::make('12345'),
            'role' => 'collector',
            'status' => 'active',
            'number' => '',
        ]);

         // seeding collector
         $collector = User::create([
            'plate_no' => 'L2OS7Z6',
            'first_name' => 'Oliver',
            'last_name' => 'Sykes',
            'email' => 'oliversykes@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'collector',
            'status' => 'inactive',
            'number' => '',
        ]);
    }
}
