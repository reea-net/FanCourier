<?php

/**
 * @file
 * Exemple of tracking AWB.
 */

if (file_exists(__DIR__ . '/../../../../autoload.php')) {
  //Downloded via packagist.org - "composer require curier/fancourier"
  include_once __DIR__ . '/../../../../autoload.php';
}
elseif (__DIR__ . '/../../vendor/autoload.php') {
  //Downloded via github (git or package)
  include_once __DIR__ . '/../../vendor/autoload.php';
}

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
    'AWB' => '2046600120090',
    'display_mode' => '1', //1 - Last status,2 - Last status from route history,3 - All statuses
    'language' => 'ro', // Optional 
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('awbUrmarire');

  $endpoint->setParams($params);
  print_r($endpoint->getResult());
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
