<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResultControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_get_result_example1(): void
    {
        $response = $this->postJson(route('result.getResult',[
            "vehicleType"=>"Citadine",
            "energy"=>"Éléctrique",
            "mileage"=>"de 25 000-30 000 km par an",
            "year"=>"2000-2010",
            "passenger"=>1
        ]));

        $response->assertStatus(200)
            ->assertJson([
                "bonus"=> 0.11,
                "finalGrading"=> 23,
                "borrowingRate"=> 2.63
            ]);
    }

    public function test_get_result_example2(): void
    {
        $response = $this->postJson(route('result.getResult',[
            "vehicleType"=>"Citadine",
            "energy"=>"Hybride",
            "mileage"=>"de 5 000-10 000 km par an",
            "year"=>"Après 2010",
            "passenger"=>4
        ]));

        $response->assertStatus(200)
            ->assertJson([
                "bonus"=> -0.53,
                "finalGrading"=> 31,
                "borrowingRate"=> 1.57
            ]);
    }

    public function test_get_result_example3(): void
    {
        $response = $this->postJson(route('result.getResult',[
            "vehicleType"=>"Cabriolet",
            "energy"=>"Diesel",
            "mileage"=>"de 10 000-15 000 km par an",
            "year"=>"1990-2000",
            "passenger"=>2
        ]));

        $response->assertStatus(200)
            ->assertJson([
                "bonus"=> -0.17,
                "finalGrading"=> 21,
                "borrowingRate"=> 2.35
            ]);
    }
}
