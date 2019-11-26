<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Conexión con la base de datos</h1>
        <?php
        $servidor = "localhost";
        $baseDatos = "introduccion";
        $usuario = "usuario";
        $clave = "clave";
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
        $consultaSql = "select * from tabla t 
                        join otratabla ot 
                        on t.campo1=ot.campo1;";
        
    /*    $consultaSql = "select ot.campo1, t.campo1 tc1 from tabla t 
                        join otratabla ot 
                        on t.campo1=ot.campo1;"; */
        
        $respuesta = $conexion->query( $consultaSql ); //La variable respuesta es un cursor
        while( $fila = $respuesta->fetch() ) { // fetch -> siguiente fila
            foreach ($fila as $indice => $valor) {
                echo "$indice: $valor<br>";
            }
            echo "<hr>";
            echo $fila[0] . "<br/>";
        }
        $respuesta->closeCursor();
        $conexion = null;
        ?>
    </body>
</html>
