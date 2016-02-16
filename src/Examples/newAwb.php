<?php

/**
 * @file
 * Exemple of generating new AWB.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;
use FanCourier\Plugin\csv\csvItem;

try {

  $params = [
    'username' => 'clienttest',
    'user_pass' => 'testare',
    'client_id' => '7032158',
  ];

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('awbGenerator');
  $endpoint->createFile();

  $item1 = csvItem::newItem();
  $item1->setItem('tip', 'standard');
  $item1->setItems(['localitate' => 'Targu Mures', 'judet' => 'Mures', 'strada' => 'Aleea Carpati', 'nr' => '1']);
  $item1->setItems(['telefon' => '0758099432',]);
  $item1->setItems(['nume_destinatar' => 'Name 1', 'plata_expeditii' => 'destinatar']);
  $item1->setItems(['greutate' => '1', 'nr_colet' => 1]);
  $endpoint->addNewItem($item1);

  $item2 = csvItem::newItem();
  $item2->setItem('tip', 'standard');
  $item2->setItems(['localitate' => 'Targu Mures', 'judet' => 'Mures', 'strada' => 'Aleea Carpati', 'nr' => '1']);
  $item2->setItems(['telefon' => '0758099432',]);
  $item2->setItems(['nume_destinatar' => 'Name 2', 'plata_expeditii' => 'destinatar']);
  $item2->setItems(['greutate' => '1', 'nr_colet' => 1]);
  $endpoint->addNewItem($item2);

  //print_r($endpoint->csvToText());

  $params['fisier'] = $endpoint->getFile();
  $endpoint->setParams($params);

  $result = $endpoint->getResult();
  foreach ($result as $key => $value) {
    print_r(str_getcsv($value));
  }
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
