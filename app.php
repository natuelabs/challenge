<?php

require_once 'bootstrap.php';

$loader = require 'vendor/autoload.php';
$loader->register();

use Symfony\Component\HttpFoundation\Request;
use App\Framework\Http\Kernel;

$request = Request::createFromGlobals();
$app = new Kernel();

// API Routes.
require 'app/Applications/Api/Http/routes.php';

$response = $app->handle($request);

if (! is_null($response)) {
    $response->send();
}
