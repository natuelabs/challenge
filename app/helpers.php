<?php

function dd()
{
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    die;
}

/**
 * @return \App\Router
 */
function router()
{
    static $instance;
    if (is_null($instance)) {
        $instance = new \App\Router();
    }

    return $instance;
}

function env($key, $default = null)
{
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }

    if ($default !== null) {
        return $default;
    }

    return null;
}

function is_dev()
{
    return env('DEVELOPMENT') === 'true';
}

function json(array $data = [], $response_code = 200)
{
    header('Content-type: application/json');
    http_response_code($response_code);
    die(json_encode($data));
}

function is_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']);
}

function array_sort_numeric_column(&$array, $column, $asc = true)
{
    $index = $asc ? 0 : 1;
    usort($array, function () use ($column, $index) {
        $args = func_get_args();
        $a = $args[$index];
        $b = $args[abs($index - 1)];
        return $a[$column] == $b[$column] ? 1 :
            $a[$column] < $b[$column] ? -1 : 1;
    });
}