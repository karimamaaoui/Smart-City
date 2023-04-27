<?php
    require_once("../../connect.php");

      class Hospital{

        private $id;
        private $name;
        private $address;
        private $description;
        private $tel;
        private $idCity;
      
    
          public function __construct($id=0,$name="",$address="",$description="",$tel="",$idCity=1){
            $this->id=$id;
            $this->name=$name;
            $this->address=$address;
            $this->description=$description;
            $this->tel=$tel;
            $this->idCity=$idCity;
            
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
            

                $stm=$pdo->prepare('SELECT * FROM hospital');
                $stm->execute();
                return $stm->fetchAll();

              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

     
        public function addHospital(){
            try{
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }

                $stm=$pdo->prepare('INSERT INTO `hospital`( `name`, `address`, `description`, `tel`, `idCity`)  VALUES (?,?,?,?,?)');
                
                $stm->execute(array($this->name,$this->address,$this->description,$this->tel,$this->idCity));

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
                
                    $stm=$pdo->prepare('DELETE FROM hospital where id=?');
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
                    $sql = 'SELECT * FROM hospital WHERE id=:id';
                    $statement = $pdo->prepare($sql);
                    $statement->execute([':id' => $id ]);
                    $city = $statement->fetch(PDO::FETCH_OBJ);
                    if (isset ($_POST['label'])  ) {
                      $label = $_POST['label'];
                      $sql = 'UPDATE hospital SET label=:label WHERE id=:id';
                      $statement = $pdo->prepare($sql);
                      if ($statement->execute([':label' => $label, ':id' => $id])) {
                        
                        header("location:../dashboard.php");
    
                    
                    }     
                    return $statement->fetchAll();
       
                }
                }catch(PDOException $e){
                    return $e->getMessage();
                }
            
        
    }
    
    
    
    
    
    
        }




?>