<?php

set_error_handler(function ($errno, $errstr) {
    throw new Exception($errstr, $errno);
}, E_ALL);

set_exception_handler(function ($e) {
    $response = [
        'error' => true,
        'status' => 500,
        'message' => 'Erro Interno',
    ];

    if (is_dev()) {
        $response['code'] = $e->getCode();
        $response['line'] = $e->getLine();
        $response['file'] = $e->getFile();
        $response['message'] = $e->getMessage();
    }

    if ($e instanceof \App\Exceptions\NotFoundException) {
        $response['status'] = 404;
        $response['message'] = $e->getMessage();
    }

    json($response, $response['status']);
});