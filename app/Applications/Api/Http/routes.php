<?php

$app->get(
    '/api/v1/products',
    ['uses' => 'App\Applications\Api\Http\Controllers\ProductsController@all']
);


$app->get(
    '/api/v1/products/search-by-name',
    ['uses' => 'App\Applications\Api\Http\Controllers\ProductsController@all']
);

$app->get(
    '/api/v1/products/search-by-specifications',
    ['uses' => 'App\Applications\Api\Http\Controllers\ProductsController@searchBySpecifications']
);

$app->get(
    '/api/v1/products/{id}',
    ['uses' => 'App\Applications\Api\Http\Controllers\ProductsController@show']
);

$app->get(
    '/api/v1/specifications',
    ['uses' => 'App\Applications\Api\Http\Controllers\ProductsController@availableSpecifications']
);

return $app;
