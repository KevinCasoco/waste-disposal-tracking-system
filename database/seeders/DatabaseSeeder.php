<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            Admin::class,
        ]);

        $this->call([
            Collector::class,
        ]);

        $this->call([
            UserAccounts::class,
        ]);

        $this->call([
            TrashBin::class,
        ]);

        $this->call([
            Sensor::class,
        ]);

        $this->call([
            Truck::class,
        ]);

        $this->call([
            TrashCan::class,
        ]);

    }
}
