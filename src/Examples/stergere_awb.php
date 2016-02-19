<?php

/**
 * @file
 * Exemple of deleting AWB.
 */

include_once __DIR__ . '/example_autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
    'AWB' => '2046600120096',
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('deleteAwb');
  $endpoint->setParams($params);
  print_r($endpoint->getResult());
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
