<?php

namespace App\Service;

interface AdapterInterface
{
    public function findAll($sort = null);
    public function findById($id = null);
    public function findByName($name = null);
    public function findBySpecifications(array $options = array(), $sort = null);
}
