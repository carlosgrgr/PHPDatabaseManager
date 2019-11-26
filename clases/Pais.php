<?php

namespace DBManager;

class Pais {
    private $code, $name, $continent, $population, $local_name, $capital;
    
    function __construct($code = null, $name = null, $continent = null, $population = null, $local_name = null, $capital = null) {
        $this->code = $code;
        $this->name = $name;
        $this->continent = $continent;
        $this->population = $population;
        $this->local_name = $local_name;
        $this->capital = $capital;
    }
    
    public function getCode() {
        return $this->code;
    }

    public function getName() {
        return $this->name;
    }

    public function getContinent() {
        return $this->continent;
    }

    public function getPopulation() {
        return $this->population;
    }

    public function getLocalName() {
        return $this->local_name;
    }

    public function getCapital() {
        return $this->capital;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setContinent($continent) {
        $this->continent = $continent;
    }

    public function setPopulation($population) {
        $this->Population = $Population;
    }

    public function setLocalName($local_name) {
        $this->local_name = $local_name;
    }

    public function setCapital($capital) {
        $this->capital = $capital;
    }

    //3º getJson
    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    //4º set genérico    
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }
    
    public function getArray($valores = true){
        $array = array();
        foreach ($this as $key => $valor) {
            if($valores === true){
                $array[$key] = $valor;
            }else{
                $array[$key]=null;
            }
        }
        return $array;
    }
    
    function read(){
        foreach ($this as $key => $valor) {
            $this->$key = Request::req($key);
        }
    }
    
}
