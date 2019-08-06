<?php

use App\Support\Arr;
use App\Support\Collection;

define('BASE_PATH', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

if (! function_exists('storage_path')) {
    /**
     * Create a absolute path to storage folder.
     *
     * @param string $file
     * @return string
     */
    function storage_path($file = '') {
        return BASE_PATH . DS . 'storage' . DS . $file;
    }
}

if (! function_exists('dd')) {
    /**
     * Dump and Die arguments.
     *
     * @param array ...$args
     */
    function dd(...$args) {
        echo "<pre>";
        var_dump($args);
        echo "</pre>";
        die();
    }
}

if (! function_exists('data_get')) {
    /**
     * Get an item from an array or object using "dot" notation.
     *
     * @param  mixed   $target
     * @param  string|array  $key
     * @param  mixed   $default
     * @return mixed
     */
    function data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        while (! is_null($segment = array_shift($key))) {
            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return value($default);
                }

                $result = Arr::pluck($target, $key);

                return in_array('*', $key) ? Arr::collapse($result) : $result;
            }

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return value($default);
            }
        }

        return $target;
    }
}

if (! function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}