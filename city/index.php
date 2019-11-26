<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageCity($bd);
$page = Request::get("page");
if($page===null || $page ===""){
    $page = 1;
}
/*Nos devuelve el numero de paginas*/
$registros = $gestor->count();
$pages = ceil($registros/  Constant::NRPP);
/**/
echo $pages;
$ciudades = $gestor->getList($page);
$op = Request::get("op");
$r = Request::get("r");
//var_dump($bd->getError());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2><a href="viewInsert.php">Insertar Ciudad</a></h2>
        <?php
        if($op!=null){
            echo "<h1>La operación $op ha dado como resultado $r</h1>";
        }
        foreach ($ciudades as $indice => $ciudad) {
            echo $ciudad;
            echo "<a class='borrar' href='phpdelete.php?ID={$ciudad->getID()}'>borrar</a> ";
            echo "<a href='viewedit.php?ID={$ciudad->getID()}'>editar</a>";
            echo "<br>";
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
        <script src="../js/scripts.js"></script>
    </body>
</html>
<?php
$bd->close();
