<?php

error_reporting(E_ALL);
ini_set("display_errors", "On");

require 'helpers.php';

$autoload = require 'vendor/autoload.php';
$autoload->register();

return $autoload;