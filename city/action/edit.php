<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);
/* ¿Quien es el usuario que intenta insertar? / Validación de datos */
$ID = Request::post("pkID");
$Name = Request::post("Name");
$CountryCode = Request::post("CountryCode");
$District = Request::post("District");
$Population = Request::post("Population");
$city = new City($ID, $Name, $CountryCode, $District, $Population);
$r = $gestor->set($city);
$bd->close();
//echo $r;
//var_dump($bd->getError());
header("Location:index.php?op=edit&r=$r");