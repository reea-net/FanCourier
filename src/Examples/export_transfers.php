<?php

/**
 * @file
 * Exemple od exporting Transfers.
 */

include_once __DIR__ . '/example_autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
    'data' => date('d.m.Y', time()),
    'language' => 'ro' // Optional.
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('exportTransfers');
  $endpoint->setParams($params);
  $endpoint->noHeader();
  $result = $endpoint->getResult();

  foreach ($result as $key => $value) {
    print_r(str_getcsv($value));
  }
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
