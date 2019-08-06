<?php

namespace App\Support\Api\Transform;

use App\Framework\Entity;

interface TransformInterface
{
    /**
     * Define entity that will be transform.
     *
     * @param Entity $entity
     * @return $this
     */
    public function setEntity(Entity $entity);

    /**
     * Transform data.
     *
     * @return array
     */
    public function transform() :  array;
}
