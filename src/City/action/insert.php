<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);

$Name = Request::post("Name");
$CountryCode = Request::post("CountryCode");
$District = Request::post("District");
$Population = Request::post("Population");
$city = new City(0, $Name, $CountryCode, $District, $Population);
$r = $gestor->insert($city);
$bd->close();
//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=insert&r=$r");