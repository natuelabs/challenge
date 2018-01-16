<?php

namespace App\Framework\Http;

use Symfony\Component\HttpFoundation\Request;

class Controller
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Controller constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
