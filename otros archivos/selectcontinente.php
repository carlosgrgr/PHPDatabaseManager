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
    var_dump($conexion->errorInfo());
    var_dump($e);
    echo 'no se ha podido conectar';
    exit();
}
$consultaSql = "select distinct Continent From country c order by Continent";
$respuesta = $conexion->query($consultaSql);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="mundo.php" method="POST">
            <label>Continente</label>
            <select name="Continent" id="Continent">
            <?php
                while( $fila = $respuesta->fetch()){
                    ?>
                    <option value="<?php echo $fila[0]; ?>"><?php echo $fila[0]; ?></option>
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
