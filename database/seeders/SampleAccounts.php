<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SampleAccounts extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Create a Faker instance

        // seeding admin
        $admin = User::create([
            'name' => $faker->name(),
            'email' => 'admin@sample.com',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        // seeding editor
        $editor = User::create([
            'name' => $faker->name(),
            'email' => 'editor@sample.com',
            'password' => Hash::make('12345'),
            'role' => 'editor',
        ]);

        // seeding user
        $editor = User::create([
            'name' => $faker->name(),
            'email' => 'user@sample.com',
            'password' => Hash::make('12345'),
            'role' => 'user',
        ]);

    }
}
