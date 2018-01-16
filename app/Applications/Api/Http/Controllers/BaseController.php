<?php

namespace App\Applications\Api\Http\Controllers;

use App\Support\Api\ApiResponse;
use App\Support\DataCollector\DataCollector;

class BaseController
{
    /**
     * @var DataCollector
     */
    protected $collector;

    /**
     * @var ApiResponse
     */
    protected $response;

    /**
     * BaseProductService constructor.
     */
    public function __construct()
    {
        $this->collector = new DataCollector(storage_path('products.json'));
        $this->response = new ApiResponse();
    }
}
