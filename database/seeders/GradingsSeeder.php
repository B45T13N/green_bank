<?php

namespace Database\Seeders;

use App\Models\Grading;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradingsSeeder extends Seeder
{
    protected $order = 1;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notations = range(0, 100, 5);

        foreach ($notations as $valeur)
        {
            Grading::create(['grading' => $valeur]);
        }
    }
}
