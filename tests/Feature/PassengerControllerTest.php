<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PassengerControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_index(): void
    {
        $response = $this->getJson(route('passenger.index'));

        $response->assertStatus(200)->assertJson([
            'data' => [
                [
                    "id"=> 1,
                    "wording"=> "1 passager",
                    "bonus"=> 11
                ]
            ]
        ]);
    }
}
