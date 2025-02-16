<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserAccounts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Create a Faker instance

        // seeding residents
        $residents = User::create([
            'first_name' => 'Kevin',
            'last_name' => '404',
            'email' => 'kevs404official@gmail.com',
            'email_verified_at' => '2024-02-02 12:42:50',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'active',
            'number' => '639094191380',
        ]);
    }
}
