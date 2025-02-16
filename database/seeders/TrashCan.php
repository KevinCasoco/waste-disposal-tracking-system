<?php

namespace Database\Seeders;

use App\Models\TrashCan as ModelsTrashCan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class TrashCan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $initialSensorData = [
            ['trash_weight' => '3.1700'],
        ];

        for ($i = 1; $i <= 365; $i++) {
            $initialSensorData[] = [
                'trash_weight' => $faker->randomFloat(2, 0, 10),
                'updated_at' => Carbon::now()->subDays($i)->toDateTimeString(),
            ];
        }

        $monthlySensorData = array_slice($initialSensorData, 0, 30);
        $weeklySensorData = array_slice($initialSensorData, 0, 7);
        $dailySensorData = [$initialSensorData[0]];

        // Seed data for monthly
        foreach ($monthlySensorData as $data) {
            ModelsTrashCan::create($data);
        }

        // Seed data for weekly
        foreach ($weeklySensorData as $data) {
            ModelsTrashCan::create($data);
        }

        // Seed data for daily
        foreach ($dailySensorData as $data) {
            ModelsTrashCan::create($data);
        }
    }
}
