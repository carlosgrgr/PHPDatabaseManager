<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCountry($bd);
$country = new Country();
$country->read();
$pkCode = Request::post("pkCode");
$r = $gestor->set($country, $pkCode);
$bd->close();

echo $r;
var_dump($bd->getError());

//header("Location:index.php?op=edit&r=$r");