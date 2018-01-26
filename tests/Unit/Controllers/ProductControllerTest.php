<?php


namespace Tests\Unit\Controllers;


use App\Controllers\ProductController;
use App\Persistence\JSONProductRepository;
use PHPUnit\Framework\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * @var ProductController
     */
    protected $controller;

    public function setUp()
    {
        JSONProductRepository::getInstance()
            ->loadProducts(__DIR__ . '/../../assets/products.json');

        $this->controller = new ProductController();
    }

    public function getIndex()
    {
        $result = $this->controller->index();
        return json_decode($result, true);
    }

    public function testCanReturnProducts()
    {
        $result = $this->getIndex();
        $this->assertEquals(1, $result['products'][0]['id']);
        $this->assertEquals(20, $result['products'][19]['id']);
    }

    public function testCanSortByPriceAsc()
    {
        $_REQUEST['sort'] = 'asc';
        $result = $this->getIndex();
        $this->assertEquals(20, $result['products'][0]['id']);
        $this->assertEquals(19, $result['products'][19]['id']);
    }

    public function testCanSortByPriceDesc()
    {
        $_REQUEST['sort'] = 'desc';
        $result = $this->getIndex();
        $this->assertEquals(19, $result['products'][0]['id']);
        $this->assertEquals(20, $result['products'][19]['id']);
    }

    public function testCanFilterOneSpecifications()
    {
        $_REQUEST['specifications'] = 'lactose-free';
        $result = $this->getIndex();
        $this->assertCount(13, $result['products']);
    }

    public function testCanFilterMultipleSpecifications()
    {
        $_REQUEST['specifications'] = 'lactose-free,gluten-free';
        $result = $this->getIndex();
        $this->assertCount(15, $result['products']);
    }

    public function testReturnEmptyWhenPassInexistentSpecifications()
    {
        $_REQUEST['specifications'] = 'inexistent-specification';
        $result = $this->getIndex();
        $this->assertCount(0, $result['products']);
    }
}