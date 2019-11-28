<?php
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
        <form action="paises.php" method="POST">
            <label>Pais</label>
            <select name="Code" id="Code">
            <?php
                while( $fila = $respuesta->fetch()){
                    ?>
                    <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1]; ?></option>
                    <?php
                }
                $respuesta->closeCursor();
                $conexion = null;
                ?>
            </select>
            <br>
            <input type="submit" value="enviar"/>
        </form>
    </body>
</html>
