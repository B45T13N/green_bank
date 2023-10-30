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
                'wording' => 'de 5 000-10 000 km par an',
                'grading' => 90,
            ],
            [
                'wording' => 'de 10 000-15 000 km par an',
                'grading' => 70,
            ],
            [
                'wording' => 'de 15 000-20 000 km par an',
                'grading' => 50,
            ],
            [
                'wording' => 'de 20 000-25 000 km par an',
                'grading' => 30,
            ],
            [
                'wording' => 'de 25 000-30 000 km par an',
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
