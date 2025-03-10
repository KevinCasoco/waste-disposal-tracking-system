<?php

namespace Database\Seeders;

use App\Models\SensorData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Sensor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

         // seeding sensor data
         $sensor = SensorData::create([
            'truck_weight' => '0.0000',
            'trash_weight' => '0.0000',
        ]);

         for ($i = 0; $i < 50; $i++) {
            SensorData::create([
                'truck_weight' => $faker->randomFloat(4, 0, 100),
                'trash_weight' => $faker->randomFloat(4, 0, 100),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
