<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SpecificationTest extends TestCase
{
    /**
     * @test API - HTTP Status - Specification.
     *
     * @return void
     */
    public function test_API_HTTPStatus_Specification()
    {
        echo 'test_API_HTTPStatus_Specification';
        $response = $this->get('http://127.0.0.1:8000/api/specification');
        $response->assertStatus(200);
    }
}
