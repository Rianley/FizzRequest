<?php
// after command  'composer install'

require __DIR__."/../src/FizzRequest.php";

use Fizzday\FizzRequest\FizzRequest;

$res = FizzRequest::all();
print_r($res);

