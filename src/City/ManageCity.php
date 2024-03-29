<?php

namespace Component\City;

use DBManager\DataBase\DBMDataBase;
use DBManager\Constant\DBMConstant;
use Component\City\MyMyCity;

class ManageCity {
    
    private $bd = null;
    private $tabla = "city";
    
    function __construct(DBMDataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($ID){
        //devuelve un objeto de la clase city
        $parametros = array();
        $parametros['ID'] = $ID;
        $this->bd->select($this->tabla, "*", "id=:ID", $parametros);
        $fila=$this->bd->getRow();
        $city = new MyCity();
        $city->set($fila);
        return $city;
    }
    
    function delete($ID){
        $parametros = array();
        $parametros['ID'] = $ID;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    
    function deleteCities($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(MyCity $city){
        return $this->delete($city->getID());
    }
    
    function set(MyCity $city){
        //Update de todos los campos menos el id, el id se usara como el where para el update numero de filas modificadas
        $parametrosSet=array();
        $parametrosSet['Name']=$city->getName();
        // $parametrosSet['CountryCode']=$city->getCountryCode();
        $parametrosSet['District']=$city->getDistrict();
        $parametrosSet['Population']=$city->getPopulation();
        
        $parametrosWhere = array();
        $parametrosWhere['ID'] = $city->getID();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
        
    }
    
    function insert(MyCity $city){
        //Se pasa un objeto city y se inserta, se devuelve el id del elemento con el que se ha insertado
        $parametrosSet=array();
        $parametrosSet['Name']=$city->getName();
        // $parametrosSet['CountryCode']=$city->getCountryCode();
        $parametrosSet['District']=$city->getDistrict();
        $parametrosSet['Population']=$city->getPopulation();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $nrpp=DBMConstant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), "id", "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $city = new MyCity();
             $city->set($fila);
             $r[]=$city;
         }
         return $r;
    }
    
     function getValuesSelect(){
        $this->bd->query($this->tabla, "ID, Name", array(), "Name");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }

}
