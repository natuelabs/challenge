<?php

namespace App\Support\Model;

class Model
{
    /**
     * Get a value from the model attribute.
     *
     * @param $name
     * @return mixed
     * @throws \PropertyNotExistsException
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        }

        throw new \PropertyNotExistsException("Property ${name} not exists in " . __CLASS__ . ".");
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this);
    }
}