<?php

/**
 * @file
 * Exemple of print AWB as HTML or PDF.
 */

include_once __DIR__ . '/example_autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
    'nr' => '2046600120090',
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('printAwb');

  //HTML
  $params['type'] = NULL; // Optional 2 for A6
  $endpoint->setParams($params);
  print_r($endpoint->getResult());

  //OR PDF
//  $endpoint->setType('pdf');
//  $params['page'] = 'A5'; // Optional -> Pdf page type: A4,A5,A6
//  $params['type'] = '0'; // Optional -> 0 or 1, if page A6 type=1
//  $params['label'] = '1'; // Optional
//  $endpoint->setParams($params);
//  header('Content-type: application/pdf');
//  //Do not print alongside HTML result (will fail to load PDF) 
//  print_r($endpoint->getResult());
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
