<?php

/**
 * @file
 * Exemple of generating new AWB.
 */
include_once __DIR__ . '/../../vendor/autoload.php';

use FanCurier\fanCurier;

try {

  $user = new stdClass();
  $user->name = 'clienttest';
  $user->pass = 'testare';
  $user->id = '7032158';

  $fc = new fanCurier();
  $endpoint = $fc->getEndpoint('Strazi', [$user]);

  //Get all
  /* $result = $endpoint->getStrazi(); */
  //By county and city
  $result = $endpoint->getStrazi('Mures', 'Targu Mures');

  foreach ($result as $key => $value) {
    print_r(str_getcsv($value));
  }
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
