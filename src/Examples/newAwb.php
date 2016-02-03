<?php

/**
 * @file
 * Exemple of generating new AWB.
 */

include_once __DIR__ . '/../../vendor/autoload.php';

use FanCurier\fanCurier;
use FanCurier\Plugin\csv\csvItem;

try {
  $fc = new fanCurier();
  $endpoint = $fc->getEndpoint('awbGenerator');

  $endpoint->createFile();  
  $item = csvItem::newItem();
  $item->setAddress(['localitate' => 'Reghin', 'judet' => 'Mures', 'strada' => 'csaba']);
  $item->setItem(0, 'standard');
  print_r($item->getItem());  
  $endpoint->addNewItem($item);
  
  print_r($endpoint->csvToText());
  
  $endpoint->getAwb();
}
catch (Exception $exc) {
  echo $exc->getMessage();
}
die;