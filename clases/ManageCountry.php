<?php


class ManageCountry {
    private $bd = null;
    private $tabla = "country";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
     function getList(){
         $this->bd->select($this->tabla, "*", "1=1", array(), "Name, Continent, Code");
         $r=array();
         while($fila =$this->bd->getRow()){
             $country = new Country();
             $country->set($fila);
             $r[]=$country;
         }
         return $r;
    }
    
    function get($Code){
        $parametros = array();
        $parametros['Code'] = $Code;
        $this->bd->select($this->tabla, "*", "Code=:Code", $parametros);
        $fila=$this->bd->getRow();
        $country = new Country();
        $country->set($fila);
        return $country;
    }
    
    function delete($Code){
         $parametros = array();
        $parametros['Code'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function forzarDelete($Code){
        $parametros = array();
        $parametros['CountryCode'] = $Code;
        $gestor = new ManageCity($this->bd);
        $gestor->deleteCities($parametros);
        $this->bd->delete("countrylanguage", $parametros); //se deberia de hacer a traves de la clase
        $parametros = array();
        $parametros['Code'] = $Code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Country $country){
        return $this->delete($country->getID());
    }
    
    function set(Country $country, $pkCode){
        $parametros = $country->getArray();
        $parametrosWhere = array();
        $parametrosWhere["Code"] = $pkCode;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    function insert(Country $country){
        $parametros = $country->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "Code, Name", array(), "Name");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
}
