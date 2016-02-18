<?php

/**
 * @file
 * Contains \FanCourier\Plugin\csv\csvMapping.
 */

namespace FanCourier\Plugin\csv;

/**
 * FanCourier CSV mapping trait.
 *
 * @author csaba.balint@reea.net
 */
trait csvMapping {

  /**
   * Return CSV file header.
   *
   * @return array
   *   Header of CSV.
   */
  public function getHeader() {
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

  /**
   * Return columns machine names.
   *
   * @return array
   *   Machine names of the CSV file columns.
   */
  public function getMachinNames() {
    return [
      'tip' => 0,
      'banca' => 1,
      'iban' => 2,
      'nr_plic' => 3,
      'nr_colet' => 4,
      'greutate' => 5,
      'plata_expeditii' => 6,
      'ramburs' => 7,
      'plata_ramburs_la' => 8,
      'valoare' => 9,
      'persoana_contact_expeditor' => 10,
      'observatii' => 11,
      'continut' => 12,
      'nume_destinatar' => 13,
      'persoana_contact' => 14,
      'telefon' => 15,
      'fax' => 16,
      'email' => 17,
      'judet' => 18,
      'localitate' => 19,
      'strada' => 20,
      'nr' => 21,
      'zip' => 22,
      'bloc' => 23,
      'scara' => 24,
      'etaj' => 25,
      'apartament' => 26,
      'inaltime_pachet' => 27,
      'latime_pachet' => 28,
      'lungime_pachet' => 29,
      'restituire' => 30,
      'centru_cost' => 31,
      'optiuni' => 32,
      'packing' => 33,
      'date_personale' => 34,
    ];
  }

}
