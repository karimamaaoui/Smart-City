<?php

      class Restaurant{

        private $id;
        private $name;
        private $address;
        private $description;
        private $tel;
        private $idCity;
        private $pic;

    
          public function __construct($id=0,$name="",$address="",$description="",$tel="",$idCity=1,$pic=""){
            $this->id=$id;
            $this->name=$name;
            $this->address=$address;
            $this->description=$description;
            $this->tel=$tel;
            $this->idCity=$idCity;
            $this->pic=$pic;
   
        }
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

        public function getPic(){
            return $this->pic;
        }
        
        public function setpic($pic){
            $this->pic=$pic;
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



        public function fetchAll(){
            try{
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            

                $stm=$pdo->prepare('SELECT * FROM restaurants');
                $stm->execute();
                return $stm->fetchAll();

              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

     
        public function addRestaurant(){
            try{
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }

                $stm=$pdo->prepare('INSERT INTO `restaurants`( `name`, `address`, `description`, `tel`, `idCity`,`pic`)  VALUES (?,?,?,?,?,?)');
                
                $stm->execute(array($this->name,$this->address,$this->description,$this->tel,$this->idCity,$this->pic));

                return $stm->fetchAll();

            
            }catch(PDOException $e){
                return $e->getMessage();
            }
                
            
            }
        

      
            public function delete(){
                try{
                    try{
                        $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    }catch(PDOException $e)
                    {
                        echo $e->getMessage();
                    }
                
                    $stm=$pdo->prepare('DELETE FROM restaurants where id=?');
                    $stm->execute([$this->id]);
                    return $stm->fetchAll();
                  
                  
    
                }catch(PDOException $e){
                    return $e->getMessage();
                }
            }
    
            public function update(){
                try{
                    try{
                        $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    }catch(PDOException $e)
                    {
                        echo $e->getMessage();
                    }
    
                 
                    $id = $_GET['id'];
                    $sql = 'SELECT * FROM restaurants WHERE id=:id';
                    $statement = $pdo->prepare($sql);
                    $statement->execute([':id' => $id ]);
                    if (isset ($_POST )) {
                      $name = $_POST['name'];
                      $description = $_POST['description'];
                      $tel = $_POST['tel'];
                      $address = $_POST['name'];

                        $sql = 'UPDATE restaurants SET name=:name, description=:description, tel=:tel, address=:address WHERE id=:id';
                      $statement = $pdo->prepare($sql);
                      if ($statement->execute([':name' => $name,':description' => $description,':tel' => $tel,':address' => $address, ':id' => $id])) {
                        
                        header("location:Restaurants.php");
    
                    
                    }     
                    return $statement->fetchAll();
       
                }
                }catch(PDOException $e){
                    return $e->getMessage();
                }
            
        
    }
    
    
    
    
    
        }




?>