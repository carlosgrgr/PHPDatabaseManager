<?php
require '../../vendor/autoload.php';

use DBManager\DataBase\DBMDataBase;
use DBManager\Request\DBMRequest;
use Component\City\MyCity;
use Component\City\ManageCity;

$bd = new DBMDataBase();

$gestor = new ManageCity($bd);
$id = DBMRequest::post("pkID");
$name = DBMRequest::post("name");
// $CountryCode = DBMRequest::post("CountryCode");
$district = DBMRequest::post("district");
$population = DBMRequest::post("population");
$city = new MyCity($id, $name, $district, $population);
$r = $gestor->set($city);
$bd->close();
// echo $r;
// var_dump( $bd->getError() );
header("Location:../index.php?op=edit&r=$r");