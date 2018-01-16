<?php

namespace App\Support\DataCollector;

use App\Support\Collection;

class DataCollector
{
    /**
     * @var array|mixed
     */
    private $data = [];

    /**
     * FileManager constructor.
     *
     * @param string $file
     * @throws DataCollectorException
     */
    public function __construct($file = '')
    {
        if (! file_exists($file)) {
            throw new DataCollectorException("File ${file} not found!");
        }

        $this->data = json_decode(file_get_contents($file));
    }

    /**
     * return all collected data.
     *
     * @return array|mixed
     */
    public function collect()
    {
        return new Collection($this->data);
    }
}