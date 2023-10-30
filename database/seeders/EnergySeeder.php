<?php

namespace Database\Seeders;

use App\Models\Energy;
use App\Models\Grading;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Energy::truncate();

        $energies = [
            [
               'name' => 'Gaz',
                'grading' => 60,
            ],
            [
                'name' => 'Diesel',
                'grading' => 40,
            ],
            [
                'name' => 'Essence',
                'grading' => 50,
            ],
            [
                'name' => 'Éléctrique',
                'grading' => 90,
            ],
            [
                'name' => 'Hybride',
                'grading' => 70,
            ]
        ];

        foreach ($energies as $energy)
        {
            $notation = Grading::where('grading', $energy['grading'])->first();

            if ($notation) {
                Energy::create([
                    'name' => $energy['name'],
                    'notation_id' => $notation->id
                ]);
            }
        }
    }
}
