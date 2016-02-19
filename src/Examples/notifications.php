<?php

/**
 * @file
 * Exemple of getting the notifications.
 */

include_once __DIR__ . '/example_autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('Observatii');
  $endpoint->setParams($params);
  $endpoint->noHeader();
  $result = $endpoint->getResult();

  foreach ($result as $key => $value) {
    echo $value . "<br/>\r\n";
  }
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
