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
                'wording' => '1960-1970',
                'grading' => 10,
            ],
            [
                'wording' => '1970-1980',
                'grading' => 30,
            ],
            [
                'wording' => '1990-2000',
                'grading' => 40,
            ],
            [
                'wording' => '2000-2010',
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
