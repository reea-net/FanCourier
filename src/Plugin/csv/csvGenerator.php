<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FanCurier\Plugin\csv;

use FanCurier\Plugin\csv\csvItem;
use CURLFile;
use Exception;

/**
 * Description of csvGenerator
 *
 * @author balintcsaba89@gmail.com
 */
abstract class csvGenerator {

  use csvMapping;

  private $tmpfname;
  private $csv;

  public function getFile() {
    return new CURLFile($this->tmpfname, 'text/csv', 'fisier');
  }

  public function createFile() {
    $this->tmpfname = tempnam("/tmp", "FanCurier");
    $this->csv = fopen($this->tmpfname, 'a');
    fputcsv($this->csv, $this->getHeader(), ',', chr(0));
  }

  public function addNewItem(csvItem $item) {
    fputcsv($this->csv, $item->getItem(), ',', chr(0));
  }

  public function csvToText() {
    $fp = fopen($this->tmpfname, "r");
    $csv = stream_get_contents($fp);
    fclose($fp);
    return $csv;
  }

  public function __destruct() {
    fclose($this->csv);
  }

}
