<?php

require __DIR__ . '/vendor/autoload.php';
require_once('controllers/Router.php');

// Based on uuid package's documentation - edit php file

// Indicate which package is used and generate a random id
use Ramsey\Uuid\Uuid;

// Include name space
// As we see, reference is missing (developer must use 'autoloader')
$uuid = Uuid::uuid4();

// Call function
echo $uuid->toString() . PHP_EOL;


$rooter = new Rooter();

$rooter->rooterReq();


?>