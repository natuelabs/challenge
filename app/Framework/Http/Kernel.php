<?php

namespace App\Framework\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Kernel implements HttpKernelInterface
{
    /**
     * @var RouteCollection
     */
    protected $routes;

    /**
     * Kernel constructor.
     */
    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    /**
     * Handles a Request to convert it to a Response.
     *
     * When $catch is true, the implementation must catch all exceptions
     * and do its best to convert them to a Response instance.
     *
     * @param Request $request A Request instance
     * @param int $type The type of the request
     *                         (one of HttpKernelInterface::MASTER_REQUEST or HttpKernelInterface::SUB_REQUEST)
     * @param bool $catch Whether to catch exceptions or not
     *
     * @return Response A Response instance
     *
     * @throws \Exception When an Exception occurs during processing
     *
     * @api
     */
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);

        try {
            $attributes = $matcher->match($request->getPathInfo());

            $controller = $attributes['_controller'];

            // call controller class and methods, if 'uses' key exists.
            if (array_key_exists('uses', $controller)) {
                list($class, $method) = explode('@', $controller['uses']);
                unset($attributes['_controller']);
                unset($attributes['_route']);
                return call_user_func_array([new $class($request), $method], $attributes);
            }

            // if not exists, work with closure.
            unset($attributes['_controller']);
            $response = call_user_func_array($controller, $attributes);
        } catch (ResourceNotFoundException $e) {
            $response = new Response(
                '"' . $request->getPathInfo() . '" not found!',
                Response::HTTP_NOT_FOUND
            );
        }

        return $response;
    }

    /**
     * Route path to controller.
     *
     * @param $path
     * @param $toController
     */
    public function get($path, $toController)
    {
        $this->routes->add(
            $path,
            new Route($path, array('_controller' => $toController), [], [], '', [], ['GET'])
        );
    }
}
