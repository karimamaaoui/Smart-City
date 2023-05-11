<?php

class Reservation {
    private $id;

    private $userId;
    private $parkingId;
    private $date;
    private $startTime;
    private $endTime;

    public function __construct($userId, $parkingId, $date) {
        $this->id=0;
        $this->userId = $userId;
        $this->parkingId = $parkingId;
        $this->date = $date;
    }
    
    
    public function getUserId() {
        return $this->userId;
    }
    
    public function getParkingId() {
        return $this->parkingId;
    }
    
    public function setParkingId($parkingId) {
         $this->parkingId=$parkingId;
    }
    
    
    public function getDate() {
        return $this->date;
    }
    
    public function getStartTime() {
        return $this->startTime;
    }
    
    public function getEndTime() {
        return $this->endTime;
    }
    
    public function setUserId($iduser) {
         $this->userId=$iduser;
    }

  
   public function setEndTime($endTime) {
    $this->endTime=$endTime;
}
  
public function setStartTime($startTime) {
    $this->startTime=$startTime;
}
 
public function setDate($date) {
    $this->date=$date;
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
    

        $stm=$pdo->prepare('SELECT `parkingId`, `userId`, `date` FROM `reservation`');
        $stm->execute();
        return $stm->fetchAll();

      

    }catch(PDOException $e){
        return $e->getMessage();
    }
}



public function makeReservation() {
        try {
            try{
                $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }

            $stmt = $pdo->prepare("INSERT INTO `reservation` (`parkingId`, `userId`, `date`) VALUES (?, ?, ?)");
            $stmt->execute([$this->parkingId, $this->userId, $this->date]);
            
               return $stmt->fetchAll();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    
        }
    
    

    }

  

?>