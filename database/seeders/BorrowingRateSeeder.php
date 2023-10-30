<?php

namespace Database\Seeders;

use App\Models\BorrowingRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowingRateSeeder extends Seeder
{
    protected $order = 1;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BorrowingRate::truncate();

        $vehicleScores = [
            [
                'score' => 10,
                'rate' => 300,
            ],
            [
                'score' => 15,
                'rate' => 274,
            ],
            [
                'score' => 25,
                'rate' => 252,
            ],
            [
                'score' => 33,
                'rate' => 210,
            ],
            [
                'score' => 40,
                'rate' => 185,
            ],
        ];

        foreach ($vehicleScores as $vehicleScore)
        {
            BorrowingRate::create([
                'score' => $vehicleScore['score'],
                'rate' => $vehicleScore['rate'],
            ]);
        }
    }
}
