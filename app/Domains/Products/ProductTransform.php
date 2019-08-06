<?php

namespace App\Domains\Products;

use App\Framework\Entity;
use App\Support\Api\Transform\TransformInterface;

class ProductTransform implements TransformInterface
{
    /**
     * @var Product
     */
    protected $entity;

    /**
     * Define entity that will be transform.
     *
     * @param Entity $entity
     * @return $this
     */
    public function setEntity(Entity $entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * Transform data.
     *
     * @return array
     */
    public function transform(): array
    {
        return [
            'id' => $this->entity->getId(),
            'name' => $this->entity->getName(),
            'price' => $this->entity->getPrice(),
            'specifications' => $this->entity->getSpecifications(),
        ];
    }
}
