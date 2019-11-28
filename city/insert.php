<?php
require '../vendor/autoload.php';

use DBManager\DataBase\DBMDataBase;

$bd = new DBMDataBase();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!-- Si la clave principal no es autonumerica tengo que ponerla dos 
        veces, una vez en hidden para que no se modifique y otra visible para
        modificarla, hay que darle dos nombres diferentes -->
        <form action="action/insert.php" method="POST">
            <input type="text" name="name" value="" placeholder="Nombre"/><br/>
            <input type="text" name="district" value="" placeholder="Provincia"/><br/>
            <input type="number" name="population" value="" placeholder="Población" /><br/>
            <input type="submit" value="Añadir"/>
        </form>
    </body>
</html>
<?php
$bd->close();