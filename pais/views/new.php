<?php

require_once( '../../vendor/autoload.php' );

use DBManager\DataBase;
use DBManager\ManagePais;

$bd = new DataBase();
$gestor_pais = new ManagePais($bd);
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
        <form action="../controller/phpinsert.php" method="POST">
            Code<sup>*</sup> <input required  type="text" name="code" value="" /><br />
            Name<sup>*</sup> <input required  type="text" name="name" value="" /><br />
            Continent<sup>*</sup> <input required  list="continentes" name="continent" value="" /><br />
            <datalist id="continentes">
                <option value="Asia" />
                <option value="Europe" />
                <option value="North America" />
                <option value="Africa" />
                <option value="Oceania" />
                <option value="Antarctica" />
                <option value="South America" />
            </datalist>
            Population<sup>*</sup> <input required  type="number" name="population" value="" /><br />
            LocalName<sup>*</sup>  <input required="" type="text" name="local_name" value="" /><br />
            Capital <input type="text" name="capital" value="" /><br />
            <input type="submit" value="Insert"/>
        </form>
    </body>
</html>
<?php
$bd->close();