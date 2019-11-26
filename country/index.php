<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCountry($bd);
$paises = $gestor->getList();
$op = Request::get("op");
$r = Request::get("r");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2><a href="viewInsert.php">Insertar País</a></h2>
        <?php
        if($op!=null){
            echo "<h1>La operación $op ha dado como resultado $r</h1>";
        }
        foreach ($paises as $indice => $pais) {
            echo $pais;
            echo "<a class='borrar' href='phpdelete.php?Code={$pais->getCode()}'>borrar</a> ";
            echo "<a class='borrar' href='phpdelete.php?f=&Code={$pais->getCode()}'>Forzar borrado</a> ";
            echo "<a href='viewedit.php?Code={$pais->getCode()}'>editar</a>";
            echo "<br>";
        }
        ?>
        <script src="../js/scripts.js"></script>
    </body>
</html>
<?php
$bd->close();
