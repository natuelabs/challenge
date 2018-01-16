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
        $sortBy = $this->request->get('sortBy');
        $order = $this->request->get('order');

        $products = (new ProductsRepository($this->collector))->getAll($sortBy, $order);
        return $this->response->collection($products, new ProductTransform());
    }

    /**
     * Show a product.
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        $product = (new ProductsRepository($this->collector))->findById($id);

        return $this->response->item($product, new ProductTransform());
    }
}
