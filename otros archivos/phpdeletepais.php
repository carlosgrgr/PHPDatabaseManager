<?php
require './clases/AutoCarga.php';
$code = Request::get("code");
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
//     var_dump($conexion->errorInfo());
//     var_dump($e);
    echo 'no se ha podido conectar';
    exit();
}

$sql = "delete from countrylanguage where CountryCode = :code";
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue("code", $code);

if($sentencia->execute()){
        echo "<h1>Bien</h1>";
        echo $sentencia->rowCount();
}else{
        echo "<h1>Mal</h1>";
        // var_dump($sentencia->errorInfo());
}

$sql = "delete from city where CountryCode = :code";
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue("code", $code);

if($sentencia->execute()){
        echo "<h1>Bien</h1>";
        echo $sentencia->rowCount();
}else{
        echo "<h1>Mal</h1>";
        // var_dump($sentencia->errorInfo());
}

$sql = "delete from country where Code = :code";
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue("code", $code);


if($sentencia->execute()){
        echo "<h1>Bien</h1>";
        echo $sentencia->rowCount();
}else{
        echo "<h1>Mal</h1>";
        // var_dump($sentencia->errorInfo());
}


