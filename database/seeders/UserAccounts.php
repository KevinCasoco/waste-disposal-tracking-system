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

        // seeding residents
        $residents = User::create([
            'first_name' => 'Kevin',
            'last_name' => '404',
            'email' => 'kevs404official@gmail.com',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'active',
            'number' => '639094191380',
        ]);

        $residents = User::create([
            'first_name' => 'Mikayla',
            'last_name' => 'Villamor',
            'email' => 'micaelavillamor@gmail.com',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'active',
            'number' => '639122580523',
        ]);

        $residents = User::create([
            'first_name' => 'Noel',
            'last_name' => 'Devil',
            'email' => 'noeldevil@gmail.com',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'inactive',
            'number' => '639122580523',
        ]);

        $residents = User::create([
            'first_name' => 'Maynard',
            'last_name' => 'Coco',
            'email' => 'maynardcoco@gmail.com',
            'location' => 'University of Caloocan, Congressional Road, Bagumbong, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1421, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'active',
            'number' => '639122580523',
        ]);

        $residents = User::create([
            'first_name' => 'Patricia',
            'last_name' => 'Torres',
            'email' => 'patricatorres@gmail.com',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'inactive',
            'number' => '639704881156',
        ]);
    }
}
