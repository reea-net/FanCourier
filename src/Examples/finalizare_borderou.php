<?php

/**
 * @file
 * Exemple od exporting Borderou.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;

try {

  $user = new stdClass();
  $user->name = 'clienttest';
  $user->pass = 'testare';
  $user->id = '7032158';

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('finalizareBorderou', [$user]);

  $result = $endpoint->finalizare();
  print_r($result);

}
catch (Exception $exc) {
  echo $exc->getMessage();
}
