<?php

class Parking {
    private $id;
    private $name;
    private $address;
    private $description;
    private $tel;
    private $idCity;
    private $numberPlace;
    private $price;
    
    public function __construct($id=0,$name="",$address="",$description="",$tel="",$idCity=1,$numberPlace=0,$price=0) {
             $this->id=$id;
            $this->name=$name;
            $this->address=$address;
            $this->description=$description;
            $this->tel=$tel;
            $this->idCity=$idCity;
            $this->numberPlace=$numberPlace;
            $this->price=$price;

        }
    
   
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
  
    public function getNumberPlace(){
        return $this->numberPlace;
    }
    public function setNumberPlace($numberPlace){
        $this->numberPlace=$numberPlace;
    }
  
    public function decrementPlaceNumber() {
        $this->numberPlace--;
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

    public function getPrice() {
        return $this->price;
    }
    
    public function setPrice($price) {
        $this->price = $price;
    }


    public function addParking(){
        try{
            try{
                $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }

            $stm=$pdo->prepare('INSERT INTO `parking`( `name`, `address`, `description`, `tel`, `idCity`,`numberPlace`,`price`)  VALUES (?,?,?,?,?,?,?)');
            $stm->execute(array($this->name,$this->address,$this->description,$this->tel,$this->idCity,$this->numberPlace,$this->price));

            return $stm->fetchAll();

        
        }catch(PDOException $e){
            return $e->getMessage();
        }
            
        
        }
    
        public function fetchAll(){
            try{
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            

                $stm=$pdo->prepare('SELECT * FROM parking');
                $stm->execute();
                return $stm->fetchAll();

              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }


    public function reserve() {
        $query = "UPDATE parking SET is_available = false WHERE id = $this->id";
        // execute the query using a database connection object
    }
    
 
}

?>