<?php

namespace App\Applications\Api\Http\Controllers;

use App\Domains\Products\ProductsRepository;
use App\Domains\Products\ProductTransform;

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
        return $this->response->collection($products, new ProductTransform());
    }

    public function show($id)
    {
        $product = (new ProductsRepository($this->collector))->findById($id);

        return $this->response->item($product, new ProductTransform());
    }
}
