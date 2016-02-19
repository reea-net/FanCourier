<?php

/**
 * @file
 * Exemple to get AWB errors.
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
  $endpoint = $fc->getEndpoint('awbErrors');
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
