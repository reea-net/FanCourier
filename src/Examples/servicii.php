<?php

/**
 * @file
 * Exemple of getting the services.
 */
include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('Servicii');
  $endpoint->setParams($params);
  $endpoint->noHeader();
  print_r($endpoint->getResult());
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
