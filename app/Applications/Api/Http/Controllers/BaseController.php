<?php

namespace App\Applications\Api\Http\Controllers;

use App\Support\Api\ApiResponse;
use App\Support\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;

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
     * @var Request
     */
    protected $request;

    /**
     * BaseProductService constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->collector = new DataCollector(storage_path('products.json'));
        $this->response = new ApiResponse();
    }
}
