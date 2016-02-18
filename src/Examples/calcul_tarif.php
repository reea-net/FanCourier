<?php

/**
 * @file
 * Exemple of tracking AWB.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => 7032158,
    'serviciu' => 'standard'
  ];

  // For internal services
  $params += [
    'localitate_dest' => 'Targu Mures',
    'judet_dest' => 'Mures',
    'plicuri' => 1,
    'colete' => 2,
    'greutate' => 5,
    'lungime' => 10,
    'latime' => 10,
    'inaltime' => 10,
    'val_decl' => 600,
    'plata_ramburs' => 'destinatar' // destinatar or expeditor
  ];

  $params['plata_la'] = 'destinatar'; // Optional: destinatar or expeditor.
  // For export services
  /*$params += [
    'modtrim' => '????',
    'greutate' => 10.22,
    'pliccolet' => 3,
    's_inaltime' => 50,
    's_latime' => 67,
    's_lungime' => 48,
    'volum' => 400,
    'dest_tara' => 'Bulgaria',
    'tipcontinut' => 1,
    'km ext' => 400,
  ];*/

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('Price');
  
  //$endpoint->setType('export');  FOR EXPORT

  $endpoint->setParams($params);
  print_r($endpoint->getResult());
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
