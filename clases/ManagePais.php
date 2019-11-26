<?php

namespace DBManager;

class ManagePais {
    private $bd = null;
    private $tabla = "pais";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
     function getList(){
         $this->bd->select($this->tabla, "*", "1=1", array(), "name, continent, code");
         $r=array();
         while($fila =$this->bd->getRow()){
             $pais = new Pais();
             $pais->set($fila);
             $r[]=$pais;
         }
         return $r;
    }
    
    function get($code){
        $parametros = array();
        $parametros['code'] = $code;
        $this->bd->select($this->tabla, "*", "Code=:Code", $parametros);
        $fila=$this->bd->getRow();
        $pais = new Pais();
        $pais->set($fila);
        return $pais;
    }
    
    function delete($code){
        $parametros = array();
        $parametros['code'] = $code;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    // function forzarDelete($code){
    //     $parametros = array();
    //     $parametros['pais_code'] = $code;
    //     $gestor = new ManageCity($this->bd);
    //     $gestor->deleteCities($parametros);
    //     $this->bd->delete("countrylanguage", $parametros); //se deberia de hacer a traves de la clase
    //     $parametros = array();
    //     $parametros['code'] = $Code;
    //     return $this->bd->delete($this->tabla, $parametros);
    // }
    
    function erase(Pais $pais){
        return $this->delete($pais->getID());
    }
    
    function set(Pais $pais, $pk_code){
        $parametros = $pais->getArray();
        $parametrosWhere = array();
        $parametrosWhere["code"] = $pk_code;
        return $this->bd->update($this->tabla, $parametros, $parametrosWhere);
    }
    
    function insert(Pais $pais){
        $parametros = $pais->getArray();
        return $this->bd->insert($this->tabla, $parametros, false);
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "code, name", array(), "name");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
}
