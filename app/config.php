<?php

use App\Persistence\JSONProductRepository;

$productRepository = JSONProductRepository::getInstance();
$productRepository->loadProducts(__DIR__ . '/../products.json');

if (!$ini = @parse_ini_file(__DIR__ . '/../.env')) {
    throw new \RuntimeException('Failed to load .env file');
}

$_ENV = array_merge($_ENV, $ini);