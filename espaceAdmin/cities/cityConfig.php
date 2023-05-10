<?php

      class CityConfig{

        private $id;
        private $label;
        private $pic;
      
    
          public function __construct($id=0,$label="",$pic=""){
            $this->id=$id;
            $this->label=$label;
            $this->pic=$pic;
            
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
      
        public function getLabel(){
            return $this->label;
        }
        
        public function setLabel($label){
            $this->label=$label;
        }

        
        public function getPic(){
            return $this->pic;
        }
        
        public function setpic($pic){
            $this->pic=$pic;
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
            

                $stm=$pdo->prepare('SELECT * FROM cities');
                $stm->execute();
                return $stm->fetchAll();

              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function checkCity($label){

            try{
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    //$result=$pdo->query("SELECT * FROM cities");
                    //print_r($result->fetch());
              
                
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            

                $stm=$pdo->prepare("SELECT * FROM cities where label='$label'");
                $stm->execute();
                if ($stm->fetchColumn()){
                    return true;
                }
                else {
                    return false;

                }
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }


        public function addCity(){
            try{
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }

                $stm=$pdo->prepare('INSERT INTO cities (label,pic) VALUES (?,?)');
                $stm->execute(array($this->label,$this->pic));
            
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
                
                    $stm=$pdo->prepare('DELETE FROM cities where id=?');
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
                    $sql = 'SELECT * FROM cities WHERE id=:id';
                    $statement = $pdo->prepare($sql);
                    $statement->execute([':id' => $id ]);
                    $city = $statement->fetch(PDO::FETCH_OBJ);
                    if (isset ($_POST['label'])  ) {
                      $label = $_POST['label'];
                      $sql = 'UPDATE cities SET label=:label WHERE id=:id';
                      $statement = $pdo->prepare($sql);
                      if ($statement->execute([':label' => $label, ':id' => $id])) {
                        
                        header("location:cities.php");
    
                    
                    }     
                    return $statement->fetchAll();
       
                }
                }catch(PDOException $e){
                    return $e->getMessage();
                }
            
        
    }
    
    
    
    
    
    
        }




?>