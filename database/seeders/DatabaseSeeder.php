<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                GradingsSeeder::class,
                PassengerSeeder::class,
                BorrowingRateSeeder::class,
                EnergySeeder::class,
                MileageSeeder::class,
                VehicleTypeSeeder::class,
                YearSeeder::class
            ]
        );
    }
}
