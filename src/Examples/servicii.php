<?php

/**
 * @file
 * Exemple of getting the services.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;

try {

  $user = new stdClass();
  $user->name = 'clienttest';
  $user->pass = 'testare';
  $user->id = '7032158';

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('Servicii', [$user]);
  $value = $endpoint->getServicii();
  print_r($value);
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
