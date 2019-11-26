<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);
$id = Request::get("ID");
$r = $gestor->delete($id);
$bd->close();
header("Location:index.php?op=delete&r=$r");