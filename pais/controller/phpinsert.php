<?php
require_once( '../../vendor/autoload.php' );

use DBManager\DataBase;
use DBManager\Pais;
use DBManager\ManagePais;

$bd = new DataBase();
$gestor = new ManagePais($bd);
$pais = new Pais();
$pais->read();

//$arrayCountry = $country->getArray();
//$arrayCountryLeer = array();
//
//foreach ($arrayCountry as $key => $value) {
//    $arrayCountryLeer[] = Request::post($key);
//}
//
//$country->set($arrayCountryLeer);
//$country->setCapital(null);

$r = $gestor->insert($pais);
$bd->close();

echo $r;
var_dump($bd->getError());

header("Location:../index.php?op=insert&r=$r");