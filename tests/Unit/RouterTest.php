<?php

namespace Tests;

use App\Router;

class RouterTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Router
     */
    protected $router;

    public function setUp()
    {
        $this->router = new Router();
    }

    public function testCanRegisterAndDispatchCorrectly()
    {
        $this->router->get('/foo', function () { echo 'bar'; });
        $this->router->dispatch('GET', '/foo');
        $this->expectOutputString('bar');
    }

    public function testCanReceiveArgumentFromUrl()
    {
        $this->router->get('/foo/([0-9]+)', function ($args) {
            echo $args[0];
        });
        $this->router->dispatch('GET', '/foo/123');
        $this->expectOutputString('123');
    }

    public function testFailsWhenCallbackIsNotAValidCallable()
    {
        $this->expectExceptionMessage("Callback is not valid callable");
        $this->router->get('/foo', ['array']);
    }

    public function testFailsWhenDispatchAInvalidMethod()
    {
        $this->expectExceptionMessage("'INVALID' is not a valid method");
        $this->router->dispatch('INVALID', '/');
    }

    public function testFailsWhenRouteIsNotFound()
    {
        $this->expectException(\App\Exceptions\NotFoundException::class);
        $this->router->dispatch('GET', '/');
    }

    public function testMatchesUriCorrectly()
    {
        $this->router->get('/avoid/that', function () {});
        $this->router->get('/match', function () {
            echo 'ok';
        });
        $this->router->dispatch('GET', '/match');
        $this->expectOutputString('ok');
    }
}