<?php

namespace FanCurier\Endpoint;

use FanCurier\Endpoint\endpointInterface;
use FanCurier\Plugin\csv\csvGenerator;

/**
 * Description of fanCurier
 *
 * @author csaba.balint@reea.net
 */
class awbGenerator extends csvGenerator implements endpointInterface {

  protected $url = 'https://www.selfawb.ro/import_awb_integrat.php';

  public static function setUp() {
    return new awbGenerator();
  }

  public function getAwb($file = NULL) {

    $post = array(
      'username' => 'clienttest',
      'client_id' => '7032158',
      'user_pass' => 'testare',
      'fisier' => isset($file) ? $file : $this->getFile(),
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->url);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    print_r($output);
    curl_close($ch);
  }

}
