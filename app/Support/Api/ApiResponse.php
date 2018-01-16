<?php

namespace App\Support\Api;

use App\Support\Api\Transform\Transform;
use App\Support\Collection;
use App\Support\Api\Transform\TransformInterface;
use Symfony\Component\HttpFoundation\Response;

class ApiResponse
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var string
     */
    private $contentType = 'application/vnd.api+json';

    /**
     * @return string
     */
    private function collectionResponseStructure()
    {
        $structure = [
            'data' => $this->data,
            'metadata' => [
                'count' => count($this->data)
            ],
            'errors' => []
        ];

        return json_encode($structure);
    }

    /**
     * @return array
     */
    private function headers()
    {
        header_remove("X-Powered-By");

        return [
            'Content-Type' => $this->contentType,
            'X-Powered-By' => 'Natue Challenge API',
        ];
    }

    /**
     * Response success with a collection.
     *
     * @param Collection $collection
     * @param TransformInterface $transform
     * @return Response
     */
    public function collection(Collection $collection, TransformInterface $transform)
    {
        $this->data = Transform::collection($collection, $transform);
        return new Response($this->collectionResponseStructure(), 200, $this->headers());
    }

    public function item($item, TransformInterface $transform)
    {
        $this->data = Transform::item($item, $transform);
        return new Response($this->collectionResponseStructure(), 200, $this->headers());
    }
}
