<?php

namespace App\Controller;

use App\Service\JsonAdapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $adapter = $this->container->get('adapter');
        $product = $adapter->getRepository('Product');

        $sort = $request->query->get('sort') ?? null;
        $name = $request->query->get('name') ?? null;
        $specifications = $request->query->get('specifications') ?? null;

        $jsonResponse = null;

        if ($name)
            $jsonResponse = $this->container->get('serializer')->serialize($product->findByName($name), 'json');

        if ($specifications) {
            $specifications = explode(',', $specifications);

            $jsonResponse = $this->container->get('serializer')->serialize(
                $product->findBySpecifications($specifications, $sort), 'json'
            );
        }

        return new JsonResponse($jsonResponse, JsonResponse::HTTP_OK);
    }

    public function one($id)
    {
        $adapter = $this->container->get('adapter');
        $product = $adapter->getRepository('Product');

        $jsonResponse = $this->container->get('serializer')->serialize($product->findById($id), 'json');

        return new JsonResponse($jsonResponse, JsonResponse::HTTP_OK);
    }

    public function all(Request $request)
    {
        $adapter = $this->container->get('adapter');
        $product = $adapter->getRepository('Product');

        $sort = $request->query->get('sort') ?? null;

        $jsonResponse = $this->container->get('serializer')->serialize($product->findAll($sort), 'json');

        return new JsonResponse($jsonResponse, JsonResponse::HTTP_OK);
    }
}
