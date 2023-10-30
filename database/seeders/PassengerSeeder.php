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
                'count' => 1,
                'bonus' => 11,
            ],
            [
                'count' => 2,
                'bonus' => -17,
            ],
            [
                'count' => 3,
                'bonus' => -29,
            ],
            [
                'count' => 4,
                'bonus' => -53,
            ],
        ];

        foreach ($passengers as $passenger)
        {
            Passenger::create([
                'count' => $passenger['count'],
                'bonus' => $passenger['bonus'],
            ]);
        }
    }
}
