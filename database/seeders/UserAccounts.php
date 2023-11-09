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
        // $faker = Faker::create(); // Create a Faker instance

        // // seeding admin
        // $admin = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'admin@sample.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        // ]);

        // seeding admin
        $admin = User::create([
            'name' => 'Andrei Kevin Casoco',
            'email' => 'andreikevincasoco@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        // seeding collector
        $collector = User::create([
            'name' => 'Jayar Grifaldea',
            'email' => 'jayargrifaldea@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'collector',
        ]);

        // seeding residents
        $residents = User::create([
            'name' => 'Micaela Villamor',
            'email' => 'mikayla@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'residents',
        ]);


    }
}
