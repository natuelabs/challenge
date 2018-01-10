<?php

namespace App\Model;

interface ProductRepositoryInterface
{
    /**
     * @return Product[]
     */
    public function getProducts();

    /**
     * @param string $id
     * return Product
     */
    public function getProduct($id);

    /**
     * @param array $specifications
     * @return Product[]
     */
    public function getBySpecifications($specifications);
}