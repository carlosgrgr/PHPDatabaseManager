<?php
require './clases/AutoCarga.php';
$continent = Request::post("Continent");
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
       
        $consultaSql = "select * from country where Continent = :continent"; //se convierte en parametro de la consulta
        $sentencia = $conexion->prepare($consultaSql);
        $sentencia->bindValue("continent", $continent);
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
        <h2>Han encontrado <?php echo $sentencia->rowCount(); ?> paises</h2>
        <?php
        
        while( $fila = $sentencia->fetch() ) { // fetch -> siguiente fila
            foreach ($fila as $indice => $valor) {
                echo "$indice: $valor";
            }
           ?>
        <a class="borrar" href="phpdeletepais.php?code=<?php echo $fila[0] ?>">Borrar</a>
          <?php
            echo "<hr>";
            echo $fila[0] . "<br/>";
        }
        $sentencia->closeCursor();
        $conexion = null;
        ?>
        <script src="js/scripts.js"></script>
    </body>
</html>
