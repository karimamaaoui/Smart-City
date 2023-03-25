<?php
    

    class SignUpConfig{

        private $id;
        private $email;
        private $username;
        private $password;
        private $roleId;
        protected $dbConx;

        public function __construct($id=0,$email="",$username="",$password=""){
            $this->id=$id;
            $this->email=$email;
            $this->username=$username;
            $this->password=$password;
            include_once("connect.php");

            $this->dbConx=$pdo;
            
        }


        public function getId(){
            return $this->id;
        }
        
        public function getUsername(){
            return $this->username;
        }
        
        public function getEmail(){
            return $this->email;
        }
        
        public function getPassword(){
            return $this->password;
        }

        public function setId($id){
            $this->id=$id;
        }
    
        public function setEmail($email){
            $this->email=$email;
        }
        public function setUsername($username){
            $this->username=$username;
        }
        public function setPassword($password){
            $this->password=$password;
        }
    
        public function checkUser($email){
            include_once("loginConfig.php");

            try{

                $stm=$this->dbConx->prepare("SELECT * FROM user where email='$email'");
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

        public function insertData(){
            try{

                $stm=$this->dbConx->prepare('INSERT INTO user( username,email,password) VALUES (?,?,?)');
                $stm->execute(array($this->username,$this->email,md5($this->password)));
                $login=new LoginConfig();
                $login->setEmail($_POST['email']);
                $login->setPassword($_POST['password']);

                $succes=$login->login();
              

            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }

?>