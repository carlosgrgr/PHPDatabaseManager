<?php

require '../vendor/autoload.php';

use DBManager\DataBase\DBMDataBase;
use DBManager\Constant\DBMConstant;
use DBManager\Request\DBMRequest;
use Component\City\ManageCity;

$bd = new DBMDataBase();
$gestor = new ManageCity($bd);
$page = DBMRequest::get("page");
if($page===null || $page ===""){
    $page = 1;
}
/*Nos devuelve el numero de paginas*/
$registros = $gestor->count();
$pages = ceil($registros /  DBMConstant::NRPP);

echo $pages;
$ciudades = $gestor->getList($page);
$op = DBMRequest::get("op");
$r = DBMRequest::get("r");
var_dump($bd->getError());


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
                <h2><a href="insert.php">Insertar Ciudad</a></h2>
                <?php
                    if($op!=null){
                        echo "<h1>La operación $op ha dado como resultado $r</h1>";
                    }
                
                    if ( $ciudades ) {
                        echo '<table class="table">';
                        foreach ($ciudades as $indice => $ciudad) {
                            echo '<tr>';
                            echo $ciudad->toTable();
                            echo "<td><a class='borrar' href='phpdelete.php?ID={$ciudad->getID()}'>borrar</a> <a href='edit.php?id={$ciudad->getID()}'>editar</a></td>";
                        }
                        echo '</table>';   
                    }

                    echo "&lt;&lt; ";
                    echo "&lt; ";
                    echo "&gt; ";
                    echo "&gt;&gt;";
                ?>

                <a href="?page=1">Primero</a>
                <a href="?page=<?php echo max(1, $page-1);?>">Anterior</a>
                <a href="?page=<?php echo min($page+1, $pages);?>">Siguiente</a>
                <a href="?page=<?php echo $pages; ?>">Ultimo</a>
            </div>
        </div>
    </div>
</main>
<script src="../js/scripts.js"></script>
    </body>
</html>
<?php
include '../layouts/footer.php';
$bd->close();  
?>