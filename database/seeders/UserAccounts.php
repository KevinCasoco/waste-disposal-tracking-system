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

        // // seeding admin
        // $admin = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'admin@sample.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        // ]);

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

        // seeding collector
        $collector = User::create([
            'first_name' => 'Jay-Ar',
            'last_name' => 'Grifaldea',
            'email' => 'jayargrifaldea@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'collector',
            'status' => 'active',
            'number' => '',
        ]);

        // seeding residents
        $residents = User::create([
            'first_name' => 'Shauna',
            'last_name' => 'Loresca',
            'email' => 'shaunaloresca@gmail.com',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'active',
            'number' => '639122580523',
        ]);

        // // seeding residents
        // $residents = User::create([
        //     'name' => 'Karl Doctolero',
        //     'email' => 'karldoctolero@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'residents',
        //     'status' => 'active',
        //     'number' => '',
        //     'region' => 'National Capital Region',
        //     'province' => '',
        //     'city' => 'City of Caloocan	',
        //     'barangay' => 'Barangay 178',
        // ]);

        // $admin = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'wastemanagement@sample.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        // ]);

        // $admin = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'wdtsofficial@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        // ]);

        // $admin = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'wastemanagement@sample.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        // ]);

        // $admin = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'wdtsofficial@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        // ]);

        // // seeding collector
        // $collector = User::create([
        //     'name' => 'Jayar Grifaldea',
        //     'email' => 'jayargrifaldea@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'collector',
        // ]);

        // $collector = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'collectors@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'collector',
        // ]);

        // $collector = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'sample@hotmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'collector',
        // ]);

        // $collector = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'garbage@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'collector',
        // ]);

        // $collector = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'francis@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'collector',
        // ]);

        // $admin = User::create([
        //     'name' => $faker->name(),
        //     'email' => 'collector@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        // ]);

        // // seeding residents
        // $residents = User::create([
        //     'name' => 'Micaela Villamor',
        //     'email' => 'mikayla@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'residents',
        // ]);

        // // seeding residents
        // $residents = User::create([
        //     'name' => 'Shauna Loresca',
        //     'email' => 'shaunaloresca@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'residents',
        // ]);

        // // seeding residents
        // $residents = User::create([
        //     'name' => 'Kevs 404',
        //     'email' => 'kevs404official@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'residents',
        // ]);


    }
}
