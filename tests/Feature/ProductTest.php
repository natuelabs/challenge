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
    public function test_API_HTTPStatus_ProductList()
    {
        $response = $this->get('http://127.0.0.1:8000/api/product');
        $response->assertStatus(200);
    }

    /**
     * @test API - HTTP Status - ProductList.
     *
     * @return void
     */
    public function test_API_HTTPStatus_ProductListWithFilter()
    {   
        $response = $this->get('http://127.0.0.1:8000/api/product?specifications[]=2&sOrderBy=asc');
        $response->assertStatus(200);
    }

    /**
     * @test API - JSON Structure.
     *
     * @return void
     */
    public function test_API_AssertJSON_Product()
    {
        $this->get('http://127.0.0.1:8000/api/product')
             ->assertJson(
                [
                    [
                        "id" => 19,
                        "name" => "Barrinhas de mandioquinha",
                        "price" => "5.90",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 19,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 19,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 19,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 19,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 12,
                        "name" => "Cápsulas de milho",
                        "price" => "7.36",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 12,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 12,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 12,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Sopa de milho",
                        "price" => "7.40",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 6,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Cápsulas de milho",
                        "price" => "9.16",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 5,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 1,
                        "name" => "Sopa de castanha do pará",
                        "price" => "9.82",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 1,
                                "id_specification" => 3
                            ]
                        ]
                    ],
                    [
                        "id" => 8,
                        "name" => "Chips de castanha do pará",
                        "price" => "11.31",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 8,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 8,
                                "id_specification" => 2
                            ]
                        ]
                    ],
                    [
                        "id" => 18,
                        "name" => "Salgadinho de limão",
                        "price" => "11.73",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 18,
                                "id_specification" => 4
                            ]
                        ]
                    ],
                    [
                        "id" => 7,
                        "name" => "Chips de morango",
                        "price" => "13.83",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 7,
                                "id_specification" => 5
                            ],
                            [
                                "id_product" => 7,
                                "id_specification" => 3
                            ]
                        ]
                    ],
                    [
                        "id" => 10,
                        "name" => "Barrinhas de mandioquinha",
                        "price" => "14.41",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 10,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 10,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 10,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 11,
                        "name" => "Salgadinho de morango",
                        "price" => "16.12",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 11,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 11,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 11,
                                "id_specification" => 5
                            ],
                            [
                                "id_product" => 11,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 13,
                        "name" => "Sopa de limão",
                        "price" => "20.79",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 13,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 13,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 13,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 13,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 4,
                        "name" => "Cápsulas de morango",
                        "price" => "24.29",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 4,
                                "id_specification" => 3
                            ]
                        ]
                    ],
                    [
                        "id" => 16,
                        "name" => "Salgadinho de milho",
                        "price" => "25.10",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 16,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 16,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 16,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 16,
                                "id_specification" => 4
                            ]
                        ]
                    ],
                    [
                        "id" => 15,
                        "name" => "Cápsulas de morango",
                        "price" => "25.63",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 15,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 15,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 14,
                        "name" => "Cápsulas de limão",
                        "price" => "26.98",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 14,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 14,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 14,
                                "id_specification" => 5
                            ],
                            [
                                "id_product" => 14,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 2,
                        "name" => "Cápsulas de castanha do pará",
                        "price" => "27.37",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 2,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 2,
                                "id_specification" => 4
                            ]
                        ]
                    ],
                    [
                        "id" => 17,
                        "name" => "Salgadinho de castanha do pará",
                        "price" => "27.52",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 17,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Chips de milho",
                        "price" => "32.24",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 3,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 9,
                        "name" => "Cápsulas de castanha do pará",
                        "price" => "32.59",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 9,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 9,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 20,
                        "name" => "Sopa de morango",
                        "price" => "33.34",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 20,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 20,
                                "id_specification" => 4
                            ]
                        ]
                    ]
                ]
             );
    }

    /**
     * @test API - JSON Structure.
     *
     * @return void
     */
    public function test_API_AssertJSON_ProductWithFilter()
    {
        $this->get('http://127.0.0.1:8000/api/product?specifications[]=2&sOrderBy=asc')
             ->assertExactJson(
                [
                    [
                        "id" => 12,
                        "name" => "Cápsulas de milho",
                        "price" => "7.36",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 12,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 12,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 12,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 6,
                        "name" => "Sopa de milho",
                        "price" => "7.40",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 6,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 6,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 5,
                        "name" => "Cápsulas de milho",
                        "price" => "9.16",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 5,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 5,
                                "id_specification" => 5
                            ]
                        ]
                    ],
                    [
                        "id" => 8,
                        "name" => "Chips de castanha do pará",
                        "price" => "11.31",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 8,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 8,
                                "id_specification" => 2
                            ]
                        ]
                    ],
                    [
                        "id" => 16,
                        "name" => "Salgadinho de milho",
                        "price" => "25.10",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 16,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 16,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 16,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 16,
                                "id_specification" => 4
                            ]
                        ]
                    ],
                    [
                        "id" => 14,
                        "name" => "Cápsulas de limão",
                        "price" => "26.98",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 14,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 14,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 14,
                                "id_specification" => 5
                            ],
                            [
                                "id_product" => 14,
                                "id_specification" => 6
                            ]
                        ]
                    ],
                    [
                        "id" => 3,
                        "name" => "Chips de milho",
                        "price" => "32.24",
                        "created_at" => null,
                        "updated_at" => null,
                        "specifications" => [
                            [
                                "id_product" => 3,
                                "id_specification" => 1
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 2
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 3
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 4
                            ],
                            [
                                "id_product" => 3,
                                "id_specification" => 5
                            ]
                        ]
                    ]
                ]
             );
    }
}
