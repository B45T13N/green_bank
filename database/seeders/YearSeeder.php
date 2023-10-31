<?php

namespace Database\Seeders;

use App\Models\Grading;
use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Year::truncate();

        $years = [
            [
                'wording' => 'Avant 1970',
                'grading' => 10,
            ],
            [
                'wording' => 'Avant 1980',
                'grading' => 30,
            ],
            [
                'wording' => 'Avant 2000',
                'grading' => 40,
            ],
            [
                'wording' => 'Avant 2010',
                'grading' => 50,
            ],
            [
                'wording' => 'Après 2010',
                'grading' => 70,
            ]
        ];

        foreach ($years as $year)
        {
            $notation = Grading::where('grading', $year['grading'])->first();

            if ($notation) {
                Year::create([
                    'wording' => $year['wording'],
                    'notation_id' => $notation->id
                ]);
            }
        }
    }
}
