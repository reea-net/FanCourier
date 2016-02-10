<?php

/**
 * @file
 * Exemple of getting the distance info.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;

try {

  $user = new stdClass();
  $user->name = 'clienttest';
  $user->pass = 'testare';
  $user->id = '7032158';

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('Localitati', [$user]);

  //Get all
  /* $result = $endpoint->getLocalitati(); */
  //By county
  $result = $endpoint->getLocalitati('Mures');

  foreach ($result as $key => $value) {
    print_r(str_getcsv($value));
  }
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
