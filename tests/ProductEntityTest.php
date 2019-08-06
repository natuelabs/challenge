<?php

namespace Tests;

use App\Domains\Products\Product;
use PHPUnit\Framework\TestCase;

class TestProductEntity extends TestCase
{

    public function test_product_creation_via_constructor()
    {
        $product = new Product(1, 'farinha de linhaça', 9.56, ['low-carb', 'sugar-free']);

        $this->assertEquals(1, $product->getId());
        $this->assertEquals('farinha de linhaça', $product->getName());
        $this->assertEquals(9.56, $product->getPrice());
        $this->assertArraySubset(['low-carb', 'sugar-free'], $product->getSpecifications());
    }

    public function test_product_creation_via_setters()
    {
        $product = new Product();
        $product->setId(1);
        $product->setName('farinha de linhaça');
        $product->setPrice(9.56);
        $product->setSpecifications(['low-carb', 'sugar-free']);

        $this->assertEquals(1, $product->getId());
        $this->assertEquals('farinha de linhaça', $product->getName());
        $this->assertEquals(9.56, $product->getPrice());
        $this->assertArraySubset(['low-carb', 'sugar-free'], $product->getSpecifications());
    }

    public function test_product_name_case()
    {
        $product = new Product();
        $product->setName('FaRiNha de Linhaça');

        $this->assertNotEquals('farinha de linhaça', $product->getName());
    }

    public function test_product_specifications()
    {
        $product = new Product();
        $product->setSpecifications(['low-carb', 'sugar-free']);

        $this->assertEquals(['low-carb', 'sugar-free'], $product->getSpecifications());
        $this->assertNotEquals(['', 'low-carb'], $product->getSpecifications());
        $this->assertNotEquals(['sugar-free', 'low-carb'], $product->getSpecifications());
        $this->assertEquals(2, count($product->getSpecifications()));
    }
}
