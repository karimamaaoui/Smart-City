<?php

class Parking {
    private $id;
    private $name;
    private $address;
    private $description;
    private $tel;
    private $idCity;
    private $pic;
    private $isAvailable;
    
    public function __construct($id,$id=0,$name="",$address="",$description="",$tel="",$idCity=1,$pic="", $isAvailable) {
        $this->id=$id;
            $this->name=$name;
            $this->address=$address;
            $this->description=$description;
            $this->tel=$tel;
            $this->idCity=$idCity;
            $this->pic=$pic;
            $this->isAvailable = $isAvailable;
    }
    
    // getters and setters for the class properties
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
  
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name=$name;
    }

    public function getTel(){
        return $this->tel;
    }
    
    public function setTel($tel){
        $this->tel=$tel;
    }
    public function getPic(){
        return $this->pic;
    }
    
    public function setpic($pic){
        $this->pic=$pic;
    }

    public function getAddress(){
        return $this->address;
    }
    
    public function setAddress($address){
        $this->address=$address;
    }
    public function getDescription(){
        return $this->description;
    }
    
    public function setDescription($description){
        $this->description=$description;
    }
    public function getIdCity(){
        return $this->idCity;
    }
    
    public function setIdCity($idCity){
        $this->idCity=$idCity;
    }

    public function getIsAvailable() {
        return $this->isAvailable;
    }
    
    public function setIsAvailable($isAvailable) {
        $this->isAvailable = $isAvailable;
    }


    public function reserve() {
        $query = "UPDATE parking SET is_available = false WHERE id = $this->id";
        // execute the query using a database connection object
    }
    
 
}

?>