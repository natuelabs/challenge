<?php

namespace App\Support\Api\Transform;

use App\Support\Collection;

class Transform
{
    /**
     * @param Collection $collection
     * @param TransformInterface $transform
     * @return Collection
     */
    public static function make(Collection $collection, TransformInterface $transform)
    {
        return $collection->map(function ($item) use ($transform) {
            return $transform->setEntity($item)->transform();
        });
    }
}