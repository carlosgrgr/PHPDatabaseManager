<?php
require '../../vendor/autoload.php';

use DBManager\DataBase\DBMDataBase;
use DBManager\Request\DBMRequest;
use Component\City\MyCity;
use Component\City\ManageCity;

$bd = new DBMDataBase();
$gestor = new ManageCity($bd);

$name = DBMRequest::post('name');
// $CountryCode = DBMRequest::post("CountryCode");
$district = DBMRequest::post('district');
$population = DBMRequest::post('population');
$city = new MyCity(0, $name, $district, $population);
$r = $gestor->insert($city);
$bd->close();
// echo $r;
// var_dump($bd->getError());
header("Location:../index.php?op=insert&r=$r");