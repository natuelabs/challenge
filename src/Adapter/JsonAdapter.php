<?php

namespace App\Adapter;

use App\Adapter\AdapterInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class JsonAdapter implements AdapterInterface
{
    private $object;
    private $serializer;
    private $repository;

    public function __construct($file = null)
    {
        $json = file_get_contents($file);
        $this->object = json_decode($json);

        $normalizers = array(new ObjectNormalizer());
        $this->serializer = new Serializer($normalizers);
    }

    public function getRepository($repository = null)
    {
        $this->repository = $repository;

        return $this;
    }

    public function findAll($sort = null)
    {
        $items = array();

        if ($sort)
            $this->sortArray($sort);

        foreach ($this->object as $item) {
            $items[] =  $this->serializer->denormalize($item, 'App\Entity\\' . $this->repository);
        }

        return $items;
    }

    public function findById($id = null)
    {
        foreach ($this->object as $item) {
            if ($item->id == $id)
                return $this->serializer->denormalize($item, 'App\Entity\\' . $this->repository);
        }

        return null;
    }

    public function findByName($name = null)
    {
        foreach ($this->object as $item) {
            if ($item->name == $name)
                return $this->serializer->denormalize($item, 'App\Entity\\' . $this->repository);
        }

        return null;
    }

    public function findBySpecifications(array $specifications = array(), $sort = null)
    {
        $items = array();

        if ($sort)
            sort($sort);

        foreach ($this->object as $item) {
            if (array_intersect($specifications, $item->specifications)) {
                $items[] =  $this->serializer->denormalize($item, 'App\Entity\\' . $this->repository);
            }
        }

        return $items;
    }

    private function sortArray($sort = null)
    {
        if ($sort == 'desc')
            $command = SORT_DESC;
        else
            $command = SORT_ASC;

        array_multisort(array_column($this->object, 'price'), $command, $this->object);
    }
}
