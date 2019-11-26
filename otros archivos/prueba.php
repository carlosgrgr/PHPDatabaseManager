<?php
    require './clases/AutoCarga.php';
    $bd = new DataBase();
    /*****************INSERT*****************/
//    $parametros = array();
//    $parametros["Name"] = "Graná";
//    $parametros["CountryCode"] = "ESP";
//    $parametros["District"] = "Andalucia";
//    $parametros["Population"] = 155000; 
//    $r = $bd->insert("city", $parametros);
    
    /***************ERASE / DELETE *****************/
//      $parametros = array();
//      $parametros["ID"]=4081;
//      $r = $bd->erase("city", "ID = :ID", $parametros); ERASE
//      $r = $bd->delete("city", $parametros); // DELETE
      
  
    /****************UPDATE*********************/
//      $parametrosSet = array();
//      $parametrosSet["District"] = "Andalucía";
//      $parametrosWhere = array();
//      $parametrosWhere["CountryCode"] = "ESP";
//      $parametrosWhere["District"] = "Andalusia";
//      $r = $bd->update("city", $parametrosSet, $parametrosWhere);
//      echo $r;
//      echo "<hr> error:";
//      var_dump($bd->getError());
       
    /************CONSULTAS******************/
//    $sql = "select * from country where Code > :code and Population > :population";
//    $parametros = array();
//    $parametros["code"] = "T";
//    $parametros["population"] = 23;
//    $bd->send($sql, $parametros);
//    $bd->query("country");
    $parametros = array();
    $parametros["Code"] = "S";
    $parametros["Name"] = "T";
//  $bd->query("country", "*", $parametros);
//  problema del método query -> SOLO IGUALDAD
//   $bd->select("country", "*", "Code > :Code or Name > :Name", $parametros);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        while ($fila = $bd->getRow()){
            $city = new City();
            $city->set($fila);
            echo $city->getName()."<br/>";
        }
//            while($fila = $bd->getRow()){
//                echo $fila[0] . " " . $fila[1]. "<br/>";
//            }
        ?>
    </body>
</html>
<?php
$bd->close();
