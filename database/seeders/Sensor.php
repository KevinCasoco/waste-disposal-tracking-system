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
            'truck_weight' => '1.2530',
            'trash_weight' => '1.2530',
        ]);
    }
}
