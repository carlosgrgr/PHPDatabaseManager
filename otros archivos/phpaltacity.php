<?php
require './clases/AutoCarga.php';

$Name = Request::post("Name");
$CountryCode = Request::post("CountryCode");
$District = Request::post("District");
$Population = Request::post("Population");

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

//Hay que hacer validacion previa

$sql = "insert into city (Name, CountryCode, District, Population)"
        . "values(:Name, :CountryCode, :District, :Population)";
    
$sentencia = $conexion->prepare($sql);
$sentencia->bindValue("Name", $Name);
$sentencia->bindValue("CountryCode", $CountryCode);
$sentencia->bindValue("District", $District);
$sentencia->bindValue("Population", $Population);

$resultado = $sentencia->execute();
// var_dump($conexion->errorInfo());


if($sentencia->execute()){
        /* Despues de hacer un insert tenemos que tener en cuenta que si la tabla dispone de un campo autonumerico,
         *  lo que tenemos que obtener es el id y si la tabla no tiene campo autonumerico tenemos que obtener 
         * el numero de filas insertadas */
        echo "<h1>Bien</h1>";
        $id = $conexion->lastInsertId(); //nos devuelve el id del registro que acabamos de insertar
        echo $id."<br/>";
        $numFilasInsertadas = $sentencia->rowCount(); // no es fiable contra todos los gestores de base de datos en el select
        echo $numFilasInsertadas;
        
}else{
        echo "<h1>Mal</h1>";
        // var_dump($sentencia->errorInfo());
}

$conexion = null;
echo $resultado;
