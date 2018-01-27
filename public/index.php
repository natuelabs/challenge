<?php

$router = require __DIR__ . '/../app/bootstrap.php';

$router->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);