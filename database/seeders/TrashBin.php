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
        // seeding trash bins
        $trash_bin = ModelsTrashBin::create([
            'trash_bin_location' => 'barangay 176',
            'latitude' => '14.77714210',
            'longitude' => '121.04305430',
        ]);
    }
}
