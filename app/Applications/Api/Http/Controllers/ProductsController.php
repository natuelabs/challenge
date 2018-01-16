<?php

namespace App\Applications\Api\Http\Controllers;

use App\Domains\Products\ProductsRepository;
use App\Domains\Products\ProductTransform;
use App\Support\Api\ApiResponse;

class ProductsController extends BaseController
{
    /**
     * Get all products.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function all()
    {
        $products = (new ProductsRepository($this->collector))->getAll();
        $response = new ApiResponse();

        return $response->collection($products, new ProductTransform());
    }

    public function show($id)
    {
        echo "show product with id: $id";
    }
}
