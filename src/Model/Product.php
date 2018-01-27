<?php

namespace App\Model;

class Product
{
    private $id;
    private $name;
    private $price;
    private $specifications;

    public function __construct($id, $name, $price, $specifications = [])
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->specifications = $specifications;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getSpecification()
    {
        return $this->specifications;
    }

    public function hasSomeSpecification($specifications)
    {
        return count(array_diff($specifications, $this->specifications)) !== count($specifications);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}