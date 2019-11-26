<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestorCountry = new ManageCountry($bd);
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
        <form action="phpinsert.php" method="POST">
            <input type="text" name="Name" value="" /><br/>
            <!--<input type="text" name="CountryCode" value="" /><br/>-->
            <?php echo Util::getSelect("CountryCode", $gestorCountry->getValuesSelect());?><br/>
            <input type="text" name="District" value="" /><br/>
            <input type="number" name="Population" value="" /><br/>
            <input type="submit" value="edicion"/>
        </form>
    </body>
</html>
<?php
$bd->close();