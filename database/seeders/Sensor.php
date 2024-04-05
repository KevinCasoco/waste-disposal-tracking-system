<?php

namespace Database\Seeders;

use App\Models\SensorData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sensor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // seeding collector
         $sensor = SensorData::create([
            'weight' => '0.2500',
        ]);

         // seeding collector
         $sensor = SensorData::create([
            'weight' => '0.3500',
        ]);

         // seeding collector
         $sensor = SensorData::create([
            'weight' => '1.2500',
        ]);
    }
}
