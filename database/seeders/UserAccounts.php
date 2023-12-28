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

        // // seeding admin
        // $admin = User::create([
        //     'first_name' => 'Andrei Kevin',
        //     'last_name' => 'Casoco',
        //     'email' => 'andreikevincasoco@gmail.com',
        //     'password' => Hash::make('12345'),
        //     'role' => 'admin',
        //     'status' => 'active',
        //     'number' => '',
        // ]);

        // seeding collector
        $collector = User::create([
            'plate_no' => '2KZ2L7C',
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
            'first_name' => 'Kevin',
            'last_name' => '404',
            'email' => 'kevs404official@gmail.com',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
            'password' => Hash::make('12345'),
            'role' => 'residents',
            'status' => 'active',
            'number' => '639122580523',
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
            'status' => 'active',
            'number' => '639122580523',
        ]);

        $residents = User::create([
            'first_name' => 'Maynard',
            'last_name' => 'Coco',
            'email' => 'maynardcoco@gmail.com',
            'location' => 'Langit Road, Bagong Silang, Zone 15, District 1, Caloocan, Northern Manila District, Metro Manila, 1428, Philippines',
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
            'status' => 'active',
            'number' => '639122580523',
        ]);
    }
}
