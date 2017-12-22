<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecificationTest extends TestCase
{
    /**
     * @test API - HTTP Status.
     *
     * @return void
     */
    public function test_API_HTTPStatus_Specification()
    {
        // echo 'test_API_HTTPStatus_Specification';
        $response = $this->get('http://127.0.0.1:8000/api/specification');
        $response->assertStatus(200);
    }

    /**
     * @test API - JSON Structure.
     *
     * @return void
     */
    public function test_API_AssertJSON_Specification()
    {
        // echo 'test_API_AssertJSON_Specification';
        $this->get('http://127.0.0.1:8000/api/specification')
             ->assertJson(
                [
                    [
                        "id"          => 1,
                        "description" => "vegan",
                        "created_at"  => null,
                        "updated_at"  => null
                    ],
                    [
                        "id"          => 2,
                        "description" => "vegetarian",
                        "created_at"  => null,
                        "updated_at"  => null
                    ],
                    [
                        "id"          => 3,
                        "description" => "low-carb",
                        "created_at"  => null,
                        "updated_at"  => null
                    ],
                    [
                        "id"          => 4,
                        "description" => "lactose-free",
                        "created_at"  => null,
                        "updated_at"  => null
                    ],
                    [
                        "id"          => 5,
                        "description" => "gluten-free",
                        "created_at"  => null,
                        "updated_at"  => null
                    ]
                ]
             );
    }
}
