<?php

namespace Tests\Feature;

use App\Models\Result;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResultControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_get_result_example1(): void
    {
        $datas = [
            "vehicleType"=>"Citadine",
            "energy"=>"Éléctrique",
            "mileage"=>"jusqu'à 30 000 km par an",
            "year"=>"Avant 2010",
            "passenger"=>"1 passager"
        ];

        $response = $this->postJson(route('result.getResult', $datas));

        $response->assertStatus(302)->assertRedirect('/api/fetchResult/1');

        $this->assertDatabaseHas('results', [
            "id" => 1,
            "vehicle_type" => $datas["vehicleType"],
            "energy"=> $datas["energy"],
            "mileage"=> $datas["mileage"],
            "year"=> $datas["year"],
            "passenger"=> $datas["passenger"]
        ]);

        $response = $this->get('/api/fetchResult/1');

        $response->assertStatus(200)
            ->assertJson([
                "bonus"=> 0.11,
                "finalGrading"=> 23,
                "finalBorrowingRate"=> 2.63,
                "borrowingRate"=> 2.52
            ]);
    }

    public function test_get_result_example2(): void
    {
        $datas =[
            "vehicleType"=>"Citadine",
            "energy"=>"Hybride",
            "mileage"=>"jusqu'à 10 000 km par an",
            "year"=>"Après 2010",
            "passenger"=>"4 passagers ou plus"
        ];

        $response = $this->postJson(route('result.getResult', $datas));

        $response->assertStatus(302)->assertRedirect('/api/fetchResult/1');

        $this->assertDatabaseHas('results', [
            "id" => 1,
            "vehicle_type" => $datas["vehicleType"],
            "energy"=> $datas["energy"],
            "mileage"=> $datas["mileage"],
            "year"=> $datas["year"],
            "passenger"=> $datas["passenger"]
        ]);


        $response = $this->get('/api/fetchResult/1');

        $response->assertStatus(200)
            ->assertJson([
                "bonus"=> -0.53,
                "finalGrading"=> 31,
                "finalBorrowingRate"=> 1.57,
                "borrowingRate"=> 2.1
            ]);
    }

    public function test_get_result_example3(): void
    {
        $datas = [
            "vehicleType"=>"Cabriolet",
            "energy"=>"Diesel",
            "mileage"=>"jusqu'à 15 000 km par an",
            "year"=>"Avant 2000",
            "passenger"=>"2 passagers"
        ];

        $response = $this->postJson(route('result.getResult', $datas));

        $this->assertDatabaseHas('results', [
            "id" => 1,
            "vehicle_type" => $datas["vehicleType"],
            "energy"=> $datas["energy"],
            "mileage"=> $datas["mileage"],
            "year"=> $datas["year"],
            "passenger"=> $datas["passenger"]
        ]);

        $response->assertStatus(302)->assertRedirect('/api/fetchResult/1');

        $response = $this->get('/api/fetchResult/1');

        $response->assertStatus(200)
            ->assertJson([
                "bonus"=> -0.17,
                "finalGrading"=> 21,
                "finalBorrowingRate"=> 2.35,
                "borrowingRate"=> 2.52
            ]);
    }

    public function test_get_result_malformed_request_add_input(): void
    {
        $response = $this->postJson(route('result.getResult',[
            "vehicleType"=>"Cabriolet",
            "energy"=>"Diesel",
            "mileage"=>"jusqu'à 15 000 km par an",
            "year"=>"Avant 2000",
            "passenger"=>"2 passagers",
            "inputAdded" =>1,
        ]));

        $response->assertStatus(400)
            ->assertJson([
                "error"=> "Unexpected parameters in the request: inputAdded"
            ]);
    }

    public function test_get_result_malformed_request_remove_passenger_input(): void
    {
        $response = $this->postJson(route('result.getResult',[
            "vehicleType"=>"Cabriolet",
            "energy"=>"Diesel",
            "mileage"=>"jusqu'à 15 000 km par an",
            "year"=>"Avant 2000",
        ]));

        $response->assertStatus(400)
            ->assertJson([
                "message"=> "The passenger field is required."
            ]);
    }

    public function test_fetch_result_on_non_existing_result(): void
    {
        $response = $this->get('/api/fetchResult/1');

        $response->assertStatus(400)
            ->assertJson([
                "message"=> "Non existing result"
            ]);
    }
}
