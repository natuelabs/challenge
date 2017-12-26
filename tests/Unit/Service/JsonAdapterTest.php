<?php

namespace App\Tests\Unit\Service;

use App\Entity\Product;
use App\Service\JsonAdapter;
use PHPUnit\Framework\TestCase;

class JsonAdapterTest extends TestCase
{
    private $repository;
    private $productEntity;

    public function setUp()
    {
        $jsonAdapter = new JsonAdapter('./products.json');
        $this->repository = $jsonAdapter->getRepository('Product');

        $this->productEntity = new Product();
    }


    public function testFindAll()
    {
        $result = $this->repository->findAll();
        $this->assertEquals(20, count($result));
    }

    public function testFindAllSort()
    {
        $this->productEntity->setId(20);
        $this->productEntity->setName('Barrinhas de mandioquinha');
        $this->productEntity->setPrice(5.9);
        $this->productEntity->setSpecifications(array('lactose-free','vegan'));

        $result = $this->repository->findAll('desc');

        $this->assertEquals($this->productEntity, $result[19]);
    }

    public function testFindById()
    {
        $this->productEntity->setId(10);
        $this->productEntity->setName('Barrinhas de mandioquinha');
        $this->productEntity->setPrice(14.41);
        $this->productEntity->setSpecifications(array('vegan', 'low-carb', 'sugar-free'));

        $result = $this->repository->findById(10);

        $this->assertEquals($this->productEntity, $result);
    }

    public function testFindName()
    {
        $this->productEntity->setId(19);
        $this->productEntity->setName('Sopa de morango');
        $this->productEntity->setPrice(33.34);
        $this->productEntity->setSpecifications(array('vegan', 'lactose-free', 'low-carb', 'gluten-free'));

        $result = $this->repository->findByName('Sopa de morango');

        $this->assertEquals($this->productEntity, $result);
    }

    public function testFindBySpecifications()
    {
        $result = $this->repository->findBySpecifications(array('low-carb', 'vegan'));

        $this->assertEquals(15, count($result));
    }
}
