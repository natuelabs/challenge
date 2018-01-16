<?php

$app->get(
    '/api/v1/products',
    ['uses' => 'App\Applications\Api\Http\Controllers\ProductsController@all']
);

$app->get(
    '/api/v1/products/{id}',
    ['uses' => 'App\Applications\Api\Http\Controllers\ProductsController@show']
);

return $app;