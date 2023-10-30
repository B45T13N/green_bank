<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VehicleTypeControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_index(): void
    {
        $response = $this->getJson(route('vehicleType.index'));

        $response->assertStatus(200)->assertJson([
            'data' => [
                [
                    "id"=> 1,
                    "category" => "Citadine",
                    "weight" => "800-1300kg",
                ]
            ]
        ]);
    }
}
