<?php

namespace Tests;

use App\Domains\Products\Product;
use App\Domains\Products\ProductsRepository;
use App\Support\Collection;
use App\Support\DataCollector\DataCollector;
use PHPUnit\Framework\TestCase;

class ProductsRepositoryTest extends TestCase
{
    /**
     * @var DataCollector
     */
    private $collector;

    /**
     * @var ProductsRepository
     */
    private $repository;

    public function setUp()
    {
        $this->collector = new DataCollector(storage_path('products.json'));
        $this->repository = new ProductsRepository($this->collector);
    }

    public function test_count_get_all_method()
    {
        $products = $this->repository->getAll(null, null, null);

        $this->assertInstanceOf(Collection::class, $products);
        $this->assertEquals(20, count($products));
    }

    public function test_sort_products_by_name()
    {
        $products = $this->repository->getAll(null, 'name', 'asc');

        $firstProduct = $products->first();
        $lastProduct = $products->last();

        $this->assertInstanceOf(Collection::class, $products);

        $this->assertEquals(20, $firstProduct->getId());
        $this->assertEquals(19, $lastProduct->getId());
        $this->assertEquals(20, $products->count());
    }

    public function test_find_by_id()
    {
        $product = $this->repository->findById(11);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals(11, $product->getId());
    }

    public function test_search_product_by_name()
    {
        $products = $this->repository->getAll('morango');
        $this->assertEquals(5, count($products));
    }

    public function test_search_by_specifications()
    {
        $products = $this->repository->getAllBySpecifications('vegan');
        $this->assertEquals(10, count($products));

        $products = $this->repository->getAllBySpecifications('vegan, sugar-free');
        $this->assertEquals(12, count($products));
    }

    public function test_get_all_specifications()
    {
        $specifications = $this->repository->getAllAvailableSpecifications();

        $compare = [
            'gluten-free',
            'lactose-free',
            'low-carb',
            'sugar-free',
            'vegan',
            'vegetarian',
        ];

        $this->assertEquals(6, count($specifications));
        $this->assertEquals($compare, $specifications->toArray());
    }
}
