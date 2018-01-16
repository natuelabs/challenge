<?php

namespace App\Domains\Products;

use App\Framework\Entity;

class Product extends Entity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var array
     */
    private $specifications;

    /**
     * Product constructor.
     *
     * @param int|null $id
     * @param string|null $name
     * @param float|null $price
     * @param array $specifications
     */
    public function __construct(
        int $id = null,
        string $name = null,
        float $price = null,
        array $specifications = []
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->specifications = $specifications;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $price
     * @return $this
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param array $specifications
     * @return $this
     */
    public function setSpecifications(array $specifications)
    {
        $this->specifications = $specifications;
        return $this;
    }

    /**
     * @return array
     */
    public function getSpecifications()
    {
        return $this->specifications;
    }
}
