<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FanCurier\Plugin\csv;

/**
 * Description of csvMaping
 *
 * @author csaba.balint@reea.net
 */
trait csvMapping {

  public function getMapping() {
    return [
      0 => "Tip serviciu",
      1 => 'Banca',
      2 => 'IBAN',
      3 => 'Nr. Plicuri',
      4 => 'Nr. Colete',
      5 => 'Greutate',
      6 => 'Plata expeditie',
      7 => 'Ramburs(bani)',
      8 => 'Plata ramburs la',
      9 => 'Valoare declarata',
      10 => 'Persoana contact expeditor',
      11 => 'Observatii',
      12 => 'Continut',
      13 => 'Nume destinatar',
      14 => 'Persoana contact',
      15 => 'Telefon',
      16 => 'Fax',
      17 => 'Email',
      18 => 'Judet',
      19 => 'Localitatea',
      20 => 'Strada',
      21 => 'Nr',
      22 => 'Cod postal',
      23 => 'Bloc',
      24 => 'Scara',
      25 => 'Etaj',
      26 => 'Apartament',
      27 => 'Inaltime pachet',
      28 => 'Latime pachet',
      29 => 'Lungime pachet',
      30 => 'Restituire',
      31 => 'Centru Cost',
      32 => 'Optiuni',
      33 => 'Packing',
      34 => 'Date personale',
    ];
  }

}
