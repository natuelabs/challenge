<?php

namespace App\Support\Api\Transform;

use App\Framework\Entity;
use App\Support\Collection;

class Transform
{
    /**
     * @param Collection $collection
     * @param TransformInterface $transform
     * @return Collection
     */
    public static function collection(Collection $collection, TransformInterface $transform)
    {
        return $collection->map(function ($item) use ($transform) {
            return $transform->setEntity($item)->transform();
        });
    }

    /**
     * @param Entity $entity
     * @param TransformInterface $transform
     * @return array
     */
    public static function item(Entity $entity, TransformInterface $transform)
    {
        return $transform->setEntity($entity)->transform();
    }
}
