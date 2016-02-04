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
  $endpoint = $fc->getEndpoint('awbUrmarire', [$user]);

  $result = $endpoint->getStatus('2028600120012', 1);
  print_r($result);
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
