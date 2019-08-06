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
     * @param $data
     * @param $count
     * @return string
     */
    private function responseData($data, $count)
    {
        $structure = [
            'errors' => [],
            'metadata' => [
                'count' => $count
            ],
            'data' => $data
        ];

        return json_encode($structure);
    }

    /**
     * @param array $errors
     * @return string
     */
    private function responseDataWithError(array $errors)
    {
        $structure = [
            'errors' => $errors,
            'metadata' => [
                'count' => 0
            ],
            'data' => []
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
        return new Response($this->responseData($this->data, $this->data->count()), 200, $this->headers());
    }

    /**
     * Response success with a specified item.
     *
     * @param $item
     * @param TransformInterface $transform
     * @return Response
     */
    public function item($item, TransformInterface $transform)
    {
        $this->data = Transform::item($item, $transform);
        $count = count($this->data) > 0 ? 1 : 0;
        return new Response($this->responseData($this->data, $count), 200, $this->headers());
    }

    /**
     * @param $data
     * @param $count
     * @return Response
     */
    public function raw($data, $count)
    {
        return new Response($this->responseData($data, $count), 200, $this->headers());
    }

    public function error(array $errors, $code = Response::HTTP_NOT_FOUND)
    {
        return new Response($this->responseDataWithError($errors), $code, $this->headers());
    }
}
