<?php
require '../vendor/autoload.php';

use DBManager\DataBase\DBMDataBase;

$bd = new DBMDataBase();

include '../layouts/header.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">DBM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Ciudades</a>
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
                <form action="action/insert.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="district">District</label>
                        <input type="text" class="form-control" name="district" id="district" placeholder="District">
                    </div>
                    <div class="form-group">
                        <label for="population">Population</label>
                        <input type="number" class="form-control" name="population" id="population" placeholder="Population">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Añadir"/>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include '../layouts/footer.php';
$bd->close();  
?>