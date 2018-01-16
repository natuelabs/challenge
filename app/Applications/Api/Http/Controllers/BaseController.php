<?php

namespace App\Applications\Api\Http\Controllers;

use App\Support\DataCollector\DataCollector;

class BaseController
{
    /**
     * @var DataCollector
     */
    protected $collector;

    /**
     * BaseProductService constructor.
     */
    public function __construct()
    {
        $this->collector = new DataCollector(storage_path('products.json'));
    }
}
