<?php
    require_once("connect.php");
    

    class LoginConfig{

        private $id;
        private $email;
        private $password;
        private $roleId;
        protected $dbConx;

        public function __construct($id=0,$email="",$password=""){
            $this->id=$id;
            $this->email=$email;
            $this->password=$password;
           // $this->dbConx=$pdo;
            
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
      
      
        public function getEmail(){
            return $this->email;
        }
        
        public function getPassword(){
            return $this->password;
        }

      
        public function setEmail($email){
            $this->email=$email;
        }
        public function setPassword($password){
            $this->password=$password;
        }
        public function getRole(){
            return $this->roleId;
        }
        public function setRole($roleId){
            $this->roleId=$roleId;
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
            

                $stm=$pdo->prepare('SELECT * FROM user');
                $stm->execute();
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
            
                $stm=$pdo->prepare('DELETE FROM user where id=?');
                $stm->execute([$this->id]);
                return $stm->fetchAll();
              
              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }


        
        public function login(){
            try{

                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            
                $stm=$pdo->prepare('SELECT * FROM user WHERE email=? and password=?');
                $stm->execute([$this->email,md5($this->password)]);
                $user=$stm->fetchAll();
                if (count($user)>0){
                    session_start();
                    $_SESSION['id']=$user[0]['id'];
                    $_SESSION['email']=$user[0]['email'];
                    $_SESSION['password']=$user[0]['password'];
                    $_SESSION['username']=$user[0]['username'];

                    echo $user[0]['roleId'];
                    if ($user[0]['roleId']==1){
                        header("location:espaceMembre/membre.php");


                    }
                    else {
                        header("location:espaceAdmin/dashboard.php");

                    }
                    return true;
                }
                else{
                    false;
                }
              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }

?> 