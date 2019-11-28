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
            Code<sup>*</sup> <input required  type="text" name="Code" value="" /><br />
            Name<sup>*</sup> <input required  type="text" name="Name" value="" /><br />
            Continent<sup>*</sup> <input required  list="continentes" name="Continent" value="" /><br />
            <datalist id="continentes">
                <option value="Asia" />
                <option value="Europe" />
                <option value="North America" />
                <option value="Africa" />
                <option value="Oceania" />
                <option value="Antarctica" />
                <option value="South America" />
            </datalist>
            Region<sup>*</sup> <input required  type="text" name="Region" value="" /><br />
            SurfaceArea<sup>*</sup> <input required  type="number" name="SurfaceArea" value="" /><br />
            IndepYear <input type="number" name="IndepYear" value="" /><br />
            Population<sup>*</sup> <input required  type="number" name="Population" value="" /><br />
            LifeExpectancy <input type="number" name="LifeExpectancy" value="" /><br />
            GNP <input type="number" name="GNP" value="" /><br />
            GNPOld <input type="number" name="GNPOld" value="" /><br />
            LocalName<sup>*</sup>  <input required="" type="text" name="LocalName" value="" /><br />
            GovernmentForm<sup>*</sup> <input required  type="text" name="GovernmentForm" value="" /><br />
            HeadOfState <input type="text" name="HeadOfState" value="" /><br />
            Capital <input type="text" name="Capital" value="" /><br />
            Code2<sup>*</sup> <input required type="text" name="Code2" value="" /><br />
            <input type="submit" value="edicion"/>
        </form>
    </body>
</html>
<?php
$bd->close();