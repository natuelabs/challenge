<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * @test API - HTTP Status - ProductList.
     *
     * @return void
     */
    public function test_API_Status_ProductList()
    {   
        echo 'test_API_Status_ProductList';
        $response = $this->get('http://127.0.0.1:8000/api/product');
        $response->assertStatus(200);
    }

    /**
     * @test API - HTTP Status - ProductList.
     *
     * @return void
     */
    public function test_API_Status_ProductListWithFilter()
    {   
        echo 'test_API_Status_ProductListWithFilter';
        $response = $this->get('http://local.natuelabschallenge:8383/api/product?specifications[]=1&specifications[]=2&sOrderBy=asc');
        $response->assertStatus(200);
    }
}
