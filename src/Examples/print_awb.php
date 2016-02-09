<?php

/**
 * @file
 * Exemple of print AWB as HTML or PDF.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCurier\fanCurier;

try {

  $user = new stdClass();
  $user->name = 'clienttest';
  $user->pass = 'testare';
  $user->id = '7032158';

  $fc = new fanCurier();
  $endpoint = $fc->getEndpoint('printAwb', [$user]);

  //HTML 
  $result = $endpoint->getHtml(2039600120027);
  print_r($result);

  //PDF
//  $result = $endpoint->getPdf(2039600120028, 'A5');
//  header('Content-type: application/pdf');
//  print_r($result);
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
