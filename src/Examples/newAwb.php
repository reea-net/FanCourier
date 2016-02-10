<?php

/**
 * @file
 * Exemple of generating new AWB.
 */
include_once __DIR__ . '/../../vendor/autoload.php';

use FanCourier\fanCourier;
use FanCourier\Plugin\csv\csvItem;

try {

  $user = new stdClass();
  $user->name = 'clienttest';
  $user->pass = 'testare';
  $user->id = '7032158';

  $fc = new fanCourier();
  $endpoint = $fc->getEndpoint('awbGenerator', [$user]);
  $endpoint->createFile();

  $item = csvItem::newItem();
  $item->setItem('tip', 'standard');
  $item->setItems(['localitate' => 'Targu Mures', 'judet' => 'Mures', 'strada' => 'Aleea Carpati', 'nr' => '1']);
  $item->setItems(['telefon' => '0758099432',]);
  $item->setItems(['nume_destinatar' => 'Name 1', 'plata_expeditii' => 'destinatar']);
  $item->setItems(['greutate' => '1', 'nr_colet' => 1]);
  $endpoint->addNewItem($item);

  $item = csvItem::newItem();
  $item->setItem('tip', 'standard');
  $item->setItems(['localitate' => 'Targu Mures', 'judet' => 'Mures', 'strada' => 'Aleea Carpati', 'nr' => '1']);
  $item->setItems(['telefon' => '0758099432',]);
  $item->setItems(['nume_destinatar' => 'Name 2', 'plata_expeditii' => 'destinatar']);
  $item->setItems(['greutate' => '1', 'nr_colet' => 1]);
  $endpoint->addNewItem($item);

  //print_r($endpoint->csvToText());

  $result = $endpoint->getAwb();
  foreach ($result as $key => $value) {
    print_r(str_getcsv($value));
  }
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
