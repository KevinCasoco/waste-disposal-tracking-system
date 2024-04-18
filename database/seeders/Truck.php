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

        // Seed initial sensor data
        $initialSensorData = [
            ['truck_weight' => '1.25000'], // Initial data point
        ];

        // Seed additional sensor data for different timestamps
        for ($i = 1; $i <= 365; $i++) { // 1 year worth of data
            $initialSensorData[] = [
                'truck_weight' => $faker->randomFloat(2, 0, 10), // Limit max value to 10
                'updated_at' => Carbon::now()->subDays($i)->toDateTimeString(),
            ];
        }

        // Seed data for monthly, weekly, and daily periods
        $monthlySensorData = array_slice($initialSensorData, 0, 30); // 30 days for monthly
        $weeklySensorData = array_slice($initialSensorData, 0, 7); // 7 days for weekly
        $dailySensorData = [$initialSensorData[0]]; // Only the initial data point for daily

        // Seed data for monthly periods
        foreach ($monthlySensorData as $data) {
            ModelsTruck::create($data);
        }

        // Seed data for weekly periods
        foreach ($weeklySensorData as $data) {
            ModelsTruck::create($data);
        }

        // Seed data for daily period
        foreach ($dailySensorData as $data) {
            ModelsTruck::create($data);
        }
    }
}
