<?php

namespace App\Applications\Api\Http\Controllers;

use App\Framework\Http\Controller;
use App\Support\Api\ApiResponse;
use App\Support\DataCollector\DataCollector;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
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
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->collector = new DataCollector(storage_path('products.json'));
        $this->response = new ApiResponse();
    }
}
