<?php

namespace App\Applications\Api\Http\Controllers;

use App\Domains\Products\ProductsRepository;
use App\Domains\Products\ProductTransform;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends BaseController
{

    /**
     * @var string
     */
    private $sortBy;

    /**
     * @var string
     */
    private $order;

    /**
     * ProductsController constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->sortBy = $this->request->get('sortBy');
        $this->order = $this->request->get('order');
    }

    /**
     * Get all products.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function all()
    {
        $products = (new ProductsRepository($this->collector))->getAll($this->sortBy, $this->order);
        return $this->response->collection($products, new ProductTransform());
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function search()
    {
        $specifications = $this->request->get('specifications');

        $products = (new ProductsRepository($this->collector))
            ->getAllBySpecifications($specifications, $this->sortBy, $this->order);

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
