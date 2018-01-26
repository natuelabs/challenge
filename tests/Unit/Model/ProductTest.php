<?php

namespace Tests\Unit\Model;

use App\Model\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /** @var Product */
    protected $product;

    public function setUp()
    {
        $this->product = new Product(1, 'foo', 123, ['unit-test']);
    }

    public function testCanGetId()
    {
        $this->assertEquals(1, $this->product->getId());
    }

    public function testCanGetName()
    {
        $this->assertEquals('foo', $this->product->getName());
    }

    public function testCanGetPrice()
    {
        $this->assertEquals(123, $this->product->getPrice());
    }

    public function testCanGetSpecification()
    {
        $this->assertEquals(['unit-test'], $this->product->getSpecification());
    }

    public function testCanCheckSpecifications()
    {
        $this->assertTrue($this->product->hasSomeSpecification(['unit-test']));
        $this->assertFalse($this->product->hasSomeSpecification(['invalid']));
    }

    public function testCanConvertToArray()
    {
        $this->assertEquals([
            'id' => 1,
            'name' => 'foo',
            'price' => 123,
            'specifications' => ['unit-test']
        ], $this->product->toArray());
    }
}