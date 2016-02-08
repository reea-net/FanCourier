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
  $endpoint = $fc->getEndpoint('scanAwb', [$user]);

  $result = $endpoint->scan(2039600120012);
  print_r($result);
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
