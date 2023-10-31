<?php

namespace Database\Seeders;

use App\Models\Passenger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PassengerSeeder extends Seeder
{
    protected $order = 2;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Passenger::truncate();

        $passengers = [
            [
                'wording' => "1 passager",
                'bonus' => 11,
            ],
            [
                'wording' => "2 passagers",
                'bonus' => -17,
            ],
            [
                'wording' => "3 passagers",
                'bonus' => -29,
            ],
            [
                'wording' => "4 passagers ou plus",
                'bonus' => -53,
            ],
        ];

        foreach ($passengers as $passenger)
        {
            Passenger::create([
                'wording' => $passenger['wording'],
                'bonus' => $passenger['bonus'],
            ]);
        }
    }
}
