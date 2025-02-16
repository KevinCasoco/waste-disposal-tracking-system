<?php

namespace Database\Seeders;

use App\Models\Truck as ModelsTruck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class Truck extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $initialSensorData = [
            ['truck_weight' => '1.25000'],
        ];

        for ($i = 1; $i <= 365; $i++) {
            $initialSensorData[] = [
                'truck_weight' => $faker->randomFloat(2, 0, 10),
                'updated_at' => Carbon::now()->subDays($i)->toDateTimeString(),
            ];
        }

        $monthlySensorData = array_slice($initialSensorData, 0, 30);
        $weeklySensorData = array_slice($initialSensorData, 0, 7);
        $dailySensorData = [$initialSensorData[0]];

        // Seed data for monthly
        foreach ($monthlySensorData as $data) {
            ModelsTruck::create($data);
        }

        // Seed data for weekly
        foreach ($weeklySensorData as $data) {
            ModelsTruck::create($data);
        }

        // Seed data for daily
        foreach ($dailySensorData as $data) {
            ModelsTruck::create($data);
        }
    }
}
