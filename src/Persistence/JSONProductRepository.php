<?php

namespace App\Persistence;

use App\Model\Product;
use App\Model\ProductRepositoryInterface;

class JSONProductRepository implements ProductRepositoryInterface
{
    static protected $instance;

    private $products;

    protected function __construct() {}
    protected function __clone() {}

    /**
     * @return JSONProductRepository
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function loadProducts($filepath)
    {
        $array_products = json_decode(file_get_contents($filepath), true);

        $this->products = array_map(function ($product) {
            return new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['specifications']
            );
        }, $array_products);
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param string $id
     * return Product
     */
    public function getProduct($id)
    {
        $key = array_search($id, array_map(function ($product) {
            return $product->getId();
        }, $this->products));

        if ($key === false) {
            throw new \InvalidArgumentException("Product #$id not found");
        }

        return $this->products[$key];
    }

    /**
     * @param array $specifications
     * @return Product[]
     */
    public function getBySpecifications($specifications)
    {
        return array_filter($this->products, function ($product) use ($specifications) {
            return $product->hasSomeSpecification($specifications);
        });
    }
}