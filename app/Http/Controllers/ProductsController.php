<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories;

class ProductsController extends Controller
{

    public function All(Request $request) {
        $requestFilter = $request->query('q');
        $requestOrder = $request->query('order');
        $filter = array();
        $order = 'ASC';

        if(isset($requestFilter) && !empty($requestFilter)) {
           $filter = explode(' ', $requestFilter);
        }
        if(isset($requestOrder) && !empty($requestOrder)) {
            $order = strtoupper($requestOrder);
        }

        $productRepository = new Repositories\ProductsRepository();
        $products = $productRepository->Search($filter, $order);

        return $products->toJSON();
    }
}
