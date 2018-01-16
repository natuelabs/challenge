<?php

namespace App\Framework\Http;

use Symfony\Component\HttpFoundation\Request;

class Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
