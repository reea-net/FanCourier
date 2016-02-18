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
    'pers_contact' => 'Aron Palmarsson',
    'tel' => 079655437,
    'email' => 'aron.palmarson@mail.com',
    'greutate' => 1,
    'inaltime' => 10,
    'lungime' => 10,
    'latime' => 10,
    'ora_ridicare' => '18:00', // format hh:mm
    'observatii' => '', // Optional
  ];

  // nr_colete or nr_plicuri must be provided.
  $params['nr_colete'] = 1;

  //Optional params if the lifting address is diferent from client address.
  $optionals = [
    'client_exp' => 'John Travolta',
    'strada' => 'Targului',
    'nr' => 1,
    'bloc' => 2,
    'scara' => 3,
    'etaj' => 7,
    'ap' => 78,
    'localitate' => 'Targu Mures',
    'judet' => 'Mures',
  ];

  $params = array_merge($params, $optionals);

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('newOrder');

  $endpoint->setParams($params);
  print_r($endpoint->getResult());
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
