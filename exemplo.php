<?php

require_once "vendor/autoload.php";

use \seduc\DigitalCep\Search;

$busca = new Search;

$resultado = $busca->getAddressFromZipcode('25850000');

print_r($resultado); 