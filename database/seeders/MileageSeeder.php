<?php

namespace Database\Seeders;

use App\Models\Mileage;
use App\Models\Grading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MileageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mileage::truncate();

        $mileages = [
            [
                'wording' => '5-10K/km',
                'grading' => 90,
            ],
            [
                'wording' => '10-15K/km',
                'grading' => 70,
            ],
            [
                'wording' => '15-20K/km',
                'grading' => 50,
            ],
            [
                'wording' => '20-25K/km',
                'grading' => 30,
            ],
            [
                'wording' => '25-30K/km',
                'grading' => 10,
            ],
        ];

        foreach ($mileages as $mileage)
        {
            $notation = Grading::where('grading', $mileage['grading'])->first();

            if ($notation) {
                Mileage::create([
                    'wording' => $mileage['wording'],
                    'notation_id' => $notation->id
                ]);
            }
        }
    }
}
