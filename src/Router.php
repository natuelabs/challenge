<?php

namespace App;

use App\Exceptions\NotFoundException;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => []
    ];

    public function get($pattern, $callback)
    {
        $this->register('GET', $pattern, $callback);
    }

    public function dispatch($method, $request_uri)
    {
        if (!isset($this->routes[$method])) {
            throw new \RuntimeException("'{$method}' is not a valid method");
        }

        if (!$match = $this->match($method, parse_url($request_uri)['path'])) {
            throw new NotFoundException("Not found");
        }

        call_user_func($match['callback'], $match['arguments']);
    }

    private function register($method, $uri, $callback)
    {
        if (!is_callable($callback)) {
            throw new \RuntimeException("Callback is not valid callable");
        }

        $this->routes[$method][$uri] = $callback;
    }

    private function match($method, $uri)
    {
        $patterns = array_keys($this->routes[$method]);
        foreach ($patterns as $pattern) {
            if (preg_match("#^{$pattern}$#", $uri, $matches) !== 1) {
                continue;
            }

            $arguments = count($matches) > 1 ? array_slice($matches, 1) : [];

            return [
                'callback' => $this->routes[$method][$pattern],
                'arguments' => $arguments,
            ];
        }

        return false;
    }
}