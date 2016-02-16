<?php

/**
 * @file
 * Exemple of scan AWB.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
    'AWB' => 2046600120094,
    'language' => 'ro', // Optional
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('scanAwb');
  $endpoint->setParams($params);
  $endpoint->noHeader();
  print_r($endpoint->getResult());
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
