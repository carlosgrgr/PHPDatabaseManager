<?php

namespace Component\City;

class MyCity {
    
    private $id, $name, /* $country_code, */ $district, $population;

    function __construct($id = null, $name = null, /* $country_code = null,*/ $district = null, $population = null) {
        $this->id = $id;
        $this->name = $name;
        // $this->country_code = $country_code;
        $this->district = $district;
        $this->population = $population;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    // public function getCountryCode() {
    //     return $this->country_code;
    // }

    public function getDistrict() {
        return $this->district;
    }

    public function getPopulation() {
        return $this->population;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // public function setCountryCode($country_code) {
    //     $this->country_code = $country_code;
    // }

    public function setDistrict($district) {
        $this->district = $district;
    }

    public function setPopulation($population) {
        $this->population = $population;
    }

    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    function setOld($valores, $inicio=0){
        $this->id = $valores[0+$inicio];   
        $this->name = $valores[1+$inicio];   
        $this->country_code = $valores[2+$inicio];   
        $this->district = $valores[3+$inicio];   
        $this->population = $valores[4+$inicio];   
    }
    
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

    public function toTable() {
        $r = '';
        foreach ($this as $key => $valor) { 
            $r .= "<td>$valor</td>";
        }
        return $r;
    }
}
