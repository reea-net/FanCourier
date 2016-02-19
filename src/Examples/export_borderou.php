<?php

/**
 * @file
 * Exemple of exporting Borderou.
 */

include_once __DIR__ . '/example_autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
    'data' => date('d.m.Y', time()),
    'mode' => 0, // 0 - Only Self AWB generated. 1 - self and non self ... Optional
    'language' => 'ro' // Optional.
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('exportBorderou');
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
