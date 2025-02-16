<?php

namespace Database\Seeders;

use App\Models\TrashBin as ModelsTrashBin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrashBin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($barangay = 176; $barangay <= 186; $barangay++) {
            ModelsTrashBin::create([
                'trash_bin_location' => "barangay $barangay",
                'latitude' => '14.77714' . ($barangay - 176),
                'longitude' => '121.04305' . ($barangay - 176),
            ]);
        }
    }
}
