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
     * @param $keyword
     * @param $sortBy
     * @param $order
     * @return Collection
     */
    public function getAll($keyword = null, $sortBy = null, $order = null)
    {
        $items = $this->sortProducts($sortBy, $order);

        if (! is_null($keyword)) {
            $items = $items->filter(function ($item) use ($keyword) {
                return false !== stristr($item->name, $keyword);
            })->flatten();
        }

        return $this->mapProducts($items);
    }

    /**
     * @param $id
     * @return Product
     */
    public function findById($id)
    {
        $product = $this->products->where('id', $id)->first();

        if (is_null($product)) {
            return null;
        }

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
            ->sort()
            ->flatten();
    }

    /**
     * Get all products by specifications separated by comma.
     *
     * @param $wantedSpecifications
     * @param $sortBy
     * @param $order
     * @return Collection
     */
    public function getAllBySpecifications($wantedSpecifications = null, $sortBy = null, $order = null)
    {
        $items = $this->sortProducts($sortBy, $order);

        if (is_null($wantedSpecifications)) {
            return $this->mapProducts($items);
        }

        $wantedSpecifications = explode(
            ',',
            preg_replace('/\s+/', '', $wantedSpecifications)
        );

        $filter = function ($item) use ($wantedSpecifications) {
            $count = 0;

            foreach ($wantedSpecifications as $specification) {
                if (preg_grep('/^' . $specification . '/i', $item->specifications)) {
                    $count++;
                }
            }

            return $count > 0;
        };

        $items = $items->filter($filter)->flatten();

        return $this->mapProducts($items);
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

    /**
     * Sort collection by key.
     *
     * @param $sortBy
     * @param $order
     * @return Collection|array|mixed|static
     */
    private function sortProducts($sortBy, $order)
    {
        $items = $this->products;

        // sort by field asc...
        if (!(is_null($sortBy) && is_null($order)) && strtolower($order) == 'asc') {
            $items = $items->sortBy($sortBy)->flatten();
        }

        //sort by field desc...
        if (!(is_null($sortBy) && is_null($order)) && strtolower($order) == 'desc') {
            $items = $items->sortByDesc($sortBy)->flatten();
        }
        return $items;
    }

    /**
     * @param Collection $items
     * @return Collection
     */
    private function mapProducts(Collection $items)
    {
        return $items->map(function ($item) {
            return $this->convertToProduct($item);
        });
    }
}
