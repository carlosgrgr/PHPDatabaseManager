<?php

require '../vendor/autoload.php';

use DBManager\DataBase\DBMDataBase;
use DBManager\Request\DBMRequest;
use Component\City\ManageCity;

$bd = new DBMDataBase();
$gestor = new ManageCity($bd);
$id = DBMRequest::get("ID");
$city = $gestor->get($id);
// $gestorCountry = new ManageCountry($bd);
// var_dump($gestorCountry->getValuesSelect());

include '../layouts/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="city/index.php">Ciudades</a>
            </li>
        </ul>
    </div>
</nav>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Si la clave principal no es autonumerica tengo que ponerla dos 
                veces, una vez en hidden para que no se modifique y otra visible para
                modificarla, hay que darle dos nombres diferentes -->
                <form action="action/edit.php" method="POST">
                    <input type="text" name="name" value="<?php echo $city->getName(); ?>" /><br/>
                    <!-- <input type="text" name="CountryCode" value="< ?php echo $city->getCountryCode(); ?>" /><br/>-->
                    <?php // echo Util::getSelect("CountryCode", $gestorCountry->getValuesSelect(), $city->getCountryCode(), false);?><br/>
                    <input type="text" name="district" value="<?php echo $city->getDistrict(); ?>" /><br/>
                    <input type="number" name="population" value="<?php echo $city->getPopulation(); ?>" /><br/>
                    <input type="hidden" name="pkID" value="<?php echo $city->getID(); ?>" /><br/>
                    <input type="submit" value="edicion"/>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
include '../layouts/footer.php';
$bd->close();