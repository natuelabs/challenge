<?php

namespace App\Support\FileManager;

class FileManager
{
    /**
     * @var array|mixed
     */
    private $collection = [];

    /**
     * FileManager constructor.
     *
     * @param string $file
     * @throws FileManagerException
     */
    public function __construct($file = '')
    {
        if (! file_exists($file)) {
            throw new FileManagerException("File ${file} not found!");
        }

        $this->collection = json_decode(file_get_contents($file));
    }

    /**
     * return all collections.
     *
     * @return array|mixed
     */
    public function collection()
    {
        return $this->collection;
    }
}