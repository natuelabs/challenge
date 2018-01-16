<?php

namespace App\Domains\Products;

use App\Support\Collection;
use App\Support\DataCollector\DataCollector;

class ProductsRepository
{
    /**
     * @var Collection
     */
    private $products;

    /**
     * ProductsRepository constructor.
     * @param DataCollector $collector
     */
    public function __construct(DataCollector $collector)
    {
        $this->products = $collector->collect();
    }

    /**
     * Get all products.
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->products->map(function ($item) {
            return $this->convertToProduct($item);
        });
    }

    /**
     * @param $id
     * @return Product
     */
    public function findById($id)
    {
        return $this->convertToProduct($this->products->where('id', $id)->first());
    }

    /**
     * Get all available specifications.
     *
     * @return Collection
     */
    public function getAllAvailableSpecifications()
    {
        return $this
            ->products
            ->pluck('specifications')
            ->flatten()
            ->unique()
            ->sort();
    }

    /**
     * Get all products by specifications separated by comma.
     *
     * @param $wantedSpecifications
     * @return Collection
     */
    public function getAllBySpecifications($wantedSpecifications)
    {
        $wantedSpecifications = explode(
            ',',
            preg_replace('/\s+/', '', $wantedSpecifications)
        );

        return $this->products->filter(function ($item) use ($wantedSpecifications) {
            foreach ($wantedSpecifications as $specification) {
                return false !== stristr(implode(",", $item->specifications), $specification);
            }
        });
    }

    /**
     * Act as cast and convert stdClass to Product.
     *
     * @param $item
     * @return Product
     */
    private function convertToProduct($item)
    {
        return new Product($item->id, $item->name, $item->price, $item->specifications);
    }
}
