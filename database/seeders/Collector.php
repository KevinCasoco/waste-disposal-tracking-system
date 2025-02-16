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
            'plate_no' => 'WDTS101',
            'license_no' => 'N23-20-0166-63',
            'first_name' => 'Joseph',
            'last_name' => 'Gregorio',
            'email' => 'none@gmail.com',
            'email_verified_at' => '2024-02-02 12:42:50',
            'password' => Hash::make('12345'),
            'role' => 'collector',
            'status' => 'active',
            'collector_first_name' => 'Noel',
            'collector_last_name' => 'Devilla',
        ]);

         // seeding collector
         $collector = User::create([
            'plate_no' => 'WDTS102',
            'license_no' => 'M23-20-0166-63',
            'first_name' => 'Oliver',
            'last_name' => 'Sykes',
            'email' => 'oliversykes@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'collector',
            'status' => 'inactive',
            'collector_first_name' => 'Jay',
            'collector_last_name' => 'Delacruz',
        ]);
    }
}
