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
  $endpoint = $fc->getEndpoint('Servicii', [$user]);
  $value = $endpoint->getServicii();
  print_r($value);
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
die;
