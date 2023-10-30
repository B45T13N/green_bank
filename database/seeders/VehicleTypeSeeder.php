<?php

namespace Database\Seeders;

use App\Models\Grading;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::truncate();

        $vehicleTypes = [
            [
                'category' => 'Citadine',
                'weight' => '800-1300kg',
                'grading' => 80,
            ],
            [
                'category' => 'Cabriolet',
                'weight' => '1300-2000kg',
                'grading' => 60,
            ],
            [
                'category' => 'Berline',
                'weight' => '1300-1800kg',
                'grading' => 65,
            ],
            [
                'category' => 'SUV / 4x4',
                'weight' => '1500-2500kg',
                'grading' => 40,
            ],
        ];

        foreach ($vehicleTypes as $vehicleType)
        {
            $notation = Grading::where('grading', $vehicleType['grading'])->first();

            if ($notation) {
                VehicleType::create([
                    'category' => $vehicleType['category'],
                    'weight' => $vehicleType['weight'],
                    'notation_id' => $notation->id
                ]);
            }
        }
    }
}
