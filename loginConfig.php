<?php
    

    class LoginConfig{

        private $id;
        private $email;
        private $password;
        protected $dbConx;

        public function __construct($id=0,$email="",$password=""){
            $this->id=$id;
            $this->email=$email;
            $this->password=$password;
            include_once("connect.php");

            $this->dbConx=$pdo;
            
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
    
        public function fetchAll(){
            try{

                $stm=$this->dbConx->prepare('SELECT * FROM user');
                $stm->execute();
                return $stm->fetchAll();

              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function login(){
            try{

                $stm=$this->dbConx->prepare('SELECT * FROM user WHERE email=? and password=?');
                $stm->execute([$this->email,md5($this->password)]);
                $user=$stm->fetchAll();
                if (count($user)>0){
                    session_start();
                    $_SESSION['id']=$user[0]['id'];
                    $_SESSION['email']=$user[0]['email'];
                    $_SESSION['password']=$user[0]['password'];
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