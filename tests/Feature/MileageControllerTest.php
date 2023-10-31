<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MileageControllerTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_index(): void
    {
        $response = $this->getJson(route('mileage.index'));

        $response->assertStatus(200)->assertJson([
            'data' => [
                [
                    "id"=> 1,
                    "wording"=> "entre 5 000-10 000 km par an",
                ]
            ]
        ]);
    }
}
