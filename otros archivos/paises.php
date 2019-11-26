<?php
require './clases/AutoCarga.php';

        $code = Request::post("Code");        
        $servidor = "localhost";
        $baseDatos = "world";
        $usuario = "mundo";
        $clave = "europa";
        try{
                $conexion = new PDO(
                'mysql:host=' . $servidor . ';'.
                'dbname=' . $baseDatos,
                $usuario,
                $clave,
                array(
                    PDO::ATTR_PERSISTENT => true,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8')
                );
        }   catch(PDOException $e){
                var_dump($conexion->errorInfo());
                var_dump($e);
                echo 'no se ha podido conectar';
                exit();
        }
    //    $consultaSql = "select * from country where Continent ='$continent'";
    //    $respuesta = $conexion->query( $consultaSql ); //La variable respuesta es un cursor        
       
        $consultaSql = "select * from city where CountryCode = :code"; //se convierte en parametro de la consulta
        $sentencia = $conexion->prepare($consultaSql);
        $sentencia->bindValue("code", $code);
        $sentencia->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Conexión con la base de datos</h1>
        <h2>Han encontrado <?php echo $sentencia->rowCount(); ?> ciudades</h2>
        <?php
        
        while( $fila = $sentencia->fetch() ) { // fetch -> siguiente fila
            foreach ($fila as $indice => $valor) {
                echo "$indice: $valor<br>";
            }
            echo "<hr>";
            echo $fila[0] . "<br/>";
        }
        $sentencia->closeCursor();
        $conexion = null;
        ?>
    </body>
</html>
