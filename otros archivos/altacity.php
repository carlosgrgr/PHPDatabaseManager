<?php

require './clases/AutoCarga.php';
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
    var_dump($conexion->errorInfo());
    var_dump($e);
    echo 'no se ha podido conectar';
    exit();
}
$consultaSql = "select Code, Name From country c order by Name";
$respuesta = $conexion->query($consultaSql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action = "phpaltacity.php" method = "POST">
            Name:<input type="text" name="Name" value="" /><br>
            CountryCode:<select name="CountryCode" id="CountryCode">
            <?php
                while( $fila = $respuesta->fetch()){
                    ?>
                    <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1]; ?></option>
                    <?php
                }
                $respuesta->closeCursor();
                $conexion = null;
                ?>
            </select><br>
            District:<input type="text" name="District" value="" /><br>
            Population:<input type="text" name="Population" value="" /><br>
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>
