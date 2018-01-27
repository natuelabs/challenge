<?php

namespace Tests\Unit\Persistence;

use App\Persistence\JSONProductRepository;
use PHPUnit\Framework\TestCase;

class JSONProductRepositoryTest extends TestCase
{
    protected $products_json_path = __DIR__ . '/../../assets/products.json';

    /**
     * @var JSONProductRepository
     */
    protected $repository;

    public function setUp()
    {
        $this->repository = JSONProductRepository::getInstance();
        $this->repository->loadProducts($this->products_json_path);
    }

    public function testCanLoadProductsFromFile()
    {
        $data = json_decode(file_get_contents($this->products_json_path), true);
        $products = $this->repository->getProducts();

        $this->assertCount(count($data), $products);

        $product_array = $data[0];
        $product_obj = $this->repository->getProduct($product_array['id']);
        $this->assertEquals($product_array['name'], $product_obj->getName());
    }

    public function testFailsWhenPassAInvalidProductId()
    {
        $this->expectExceptionMessage('Product #123 not found');
        $this->repository->getProduct(123);
    }

    public function testCanGetBySpecifications()
    {
        $products = $this->repository->getBySpecifications(['lactose-free']);
        $this->assertCount(13, $products);
    }

    public function testCanGetMultipleSpecifications()
    {
        $products = $this->repository->getBySpecifications(['lactose-free', 'gluten-free']);
        $this->assertCount(15, $products);
    }

    public function testReturnEmptyOnInexistentSpecifications()
    {
        $products = $this->repository->getBySpecifications(['inexistent-specification']);
        $this->assertCount(0, $products);
    }
}