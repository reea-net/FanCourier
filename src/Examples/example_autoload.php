<?php

if (file_exists(__DIR__ . '/../../../../autoload.php')) {
  //Downloded via packagist.org - "composer require curier/fancourier"
  include_once __DIR__ . '/../../../../autoload.php';
}
elseif (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
  //Downloded via github (git or package)
  include_once __DIR__ . '/../../vendor/autoload.php';
}else{
  die('Sorry something went wrong and we couldn`t load the "autoload.php". Please check README.md');
}
