<?php

require './clases/AutoCarga.php';

$Code = Request::post("Code");
$Name = Request::post("Name");
$Continent = Request::post("Continent");
$Region = Request::post("Region");
$SurfaceArea = Request::post("SurfaceArea");
$IndepYear = Request::post("IndepYear");
$Population = Request::post("Population");
$LifeExpectancy = Request::post("LifeExpectancy");
$GNP = Request::post("GNP");
$GNPOld = Request::post("GNPOld");
$LocalName = Request::post("LocalName");
$GovernmentForm = Request::post("GovernmentForm");
$HeadOfState = Request::post("HeadOfState");
$Capital = Request::post("Capital");
$Code2 = Request::post("Code2");


$servidor = "localhost";
$baseDatos = "world";
$usuario = "mundo";
$clave = "europa";
try {
    $conexion = new PDO(
            'mysql:host=' . $servidor . ';' .
            'dbname=' . $baseDatos, $usuario, $clave, array(
        PDO::ATTR_PERSISTENT => true,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8')
    );
} catch (PDOException $e) {
    // var_dump($conexion->errorInfo());
    // var_dump($e);
    echo 'no se ha podido conectar';
    exit();
}

//Hay que hacer validacion previa

$sql = "insert into country "
        . "(Code, Name, Continent, Region,"
        . " SurfaceArea, IndepYear, Population,"
        . " LifeExpectancy, GNP, GNPOld, LocalName,"
        . " GovernmentForm, HeadOfState, Capital,"
        . " Code2) values(:Code, :Name, :Continent, :Region,"
        . " :SurfaceArea, :IndepYear, :Population, :LifeExpectancy,"
        . " :GNP, :GNPOld, :LocalName, :GovernmentForm,"
        . " :HeadOfState, :Capital, :Code2)";

$sentencia = $conexion->prepare($sql);
$sentencia->bindValue("Code", $Code);
$sentencia->bindValue("Name", $Name);
$sentencia->bindValue("Continent", $Continent);
$sentencia->bindValue("Region", $Region);
$sentencia->bindValue("SurfaceArea", $SurfaceArea);
$sentencia->bindValue("IndepYear", $IndepYear);
$sentencia->bindValue("Population", $Population);
$sentencia->bindValue("LifeExpectancy", $LifeExpectancy);
$sentencia->bindValue("GNP", $GNP);
$sentencia->bindValue("GNPOld", $GNPOld);
$sentencia->bindValue("LocalName", $LocalName);
$sentencia->bindValue("GovernmentForm", $GovernmentForm);
$sentencia->bindValue("HeadOfState", $HeadOfState);
$sentencia->bindValue("Capital", null);
$sentencia->bindValue("Code2", $Code2);
$resultado = $sentencia->execute();
// var_dump($conexion->errorInfo());

$conexion = null;
echo $resultado;

