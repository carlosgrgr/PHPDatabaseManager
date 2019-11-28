<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCountry($bd);
$code = Request::get("Code");
$country = $gestor->get($code);
//$gestorCountry = new ManageCountry($bd);
//var_dump($gestorCountry->getValuesSelect());
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
        <form action="phpedit.php" method="POST">
            Code<sup>*</sup> <input required  type="text" name="Code" value="<?php echo $country->getCode()?>" /><br />
            Name<sup>*</sup> <input required  type="text" name="Name" value="<?php echo $country->getName()?>" /><br />
            Continent<sup>*</sup> <input required  list="continentes" name="Continent" value="<?php echo $country->getContinent()?>" /><br />
            <datalist id="continentes">
                <option value="Asia" />
                <option value="Europe" />
                <option value="North America" />
                <option value="Africa" />
                <option value="Oceania" />
                <option value="Antarctica" />
                <option value="South America" />
            </datalist>
            Region<sup>*</sup> <input required  type="text" name="Region" value="<?php echo $country->getRegion()?>" /><br />
            SurfaceArea<sup>*</sup> <input required  type="number" name="SurfaceArea" value="<?php echo $country->getSurfaceArea()?>" /><br />
            IndepYear <input type="number" name="IndepYear" value="<?php echo $country->getIndepYear()?>" /><br />
            Population<sup>*</sup> <input required  type="number" name="Population" value="<?php echo $country->getPopulation()?>" /><br />
            LifeExpectancy <input type="number" name="LifeExpectancy" value="<?php echo $country->getLifeExpectancy()?>" /><br />
            GNP <input type="number" name="GNP" value="<?php echo $country->getGNP()?>" /><br />
            GNPOld <input type="number" name="GNPOld" value="<?php echo $country->getGNPOld()?>" /><br />
            LocalName<sup>*</sup>  <input required="" type="text" name="LocalName" value="<?php echo $country->getLocalName()?>" /><br />
            GovernmentForm<sup>*</sup> <input required  type="text" name="GovernmentForm" value="<?php echo $country->getGovernmentForm()?>" /><br />
            HeadOfState <input type="text" name="HeadOfState" value="<?php echo $country->getHeadOfState()?>" /><br />
            Capital <input type="text" name="Capital" value="<?php echo $country->getCapital()?>" /><br />
            Code2<sup>*</sup> <input required type="text" name="Code2" value="<?php echo $country->getCode2()?>" /><br />
            <input type="hidden" name="pkCode" value="<?php echo $country->getCode()?>" />
            <input type="submit" value="edicion"/>
        </form>
    </body>
</html>
<?php
$bd->close();