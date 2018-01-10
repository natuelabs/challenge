<?php

namespace App\Controllers;

use App\Persistence\JSONProductRepository;

class ProductController
{

    public static function index()
    {
        $specification = isset($_REQUEST['specifications']) ? explode(',', $_REQUEST['specifications']) : [];

        $productsRepository = JSONProductRepository::getInstance();

        $products = $specification ?
            $productsRepository->getBySpecifications($specification) :
            $productsRepository->getProducts();

        $array_products = array_map(function ($product) {
            return $product->toArray();
        }, $products);

        if (isset($_REQUEST['sort']) && in_array(strtolower($_REQUEST['sort']), ['asc', 'desc'])) {
            array_sort_numeric_column($array_products, 'price', $_REQUEST['sort'] == 'asc');
        }

        json([
            'products' => $array_products
        ], 200);
    }
}