<?php

/**
 * @file
 * Exemple of getting the notifications.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCurier\fanCurier;

try {

  $user = new stdClass();
  $user->name = 'clienttest';
  $user->pass = 'testare';
  $user->id = '7032158';

  $fc = new fanCurier();
  $endpoint = $fc->getEndpoint('Observatii', [$user]);
  $result = $endpoint->getNotifications();

  foreach ($result as $key => $value) {
    echo $value . "<br/>\r\n";
  }
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
