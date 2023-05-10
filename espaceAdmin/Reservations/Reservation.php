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
    
   /* public function makeReservation() {
        if ($this->parking->isAvailable()) {
            $this->parking->setNumberPlace($this->parking->getNumberPlace() - 1);
            
          
        // make the reservation by inserting a new row into the reservations table
        $query = "INSERT INTO reservations (user_id, parkingId, date, start_time, end_time, num_spaces) VALUES ($this->userId, $this->parkingId, '$this->date', '$this->startTime', '$this->endTime', $this->numSpaces)";
        // execute the query using a database connection object
        
        // update the status of the selected parking space to "reserved"
        $query = "UPDATE parking_spaces SET status = 'reserved' WHERE id = $this->parkingId";
        // execute the query using a database connection object
        
        // update the available count of parking spaces for the selected parking lot and time range
        $lotId = $this->getSpace()->getLotId();
        $availableCount = ParkingSpace::getAvailableCount($lotId, $this->date, $this->startTime, $this->endTime);
        $query = "UPDATE availability SET count = $availableCount WHERE lot_id = $lotId AND date = '$this->date' AND start_time = '$this->startTime'";
        // execute the query using a database connection object
    }}*/
    
    
    
    // getters and setters for the class properties
 /*   public function getId() {
        return $this->id;
    }*/
    
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

  /*  public function setId($id) {
        $this->id=$id;
   }*/
   
   public function setEndTime($endTime) {
    $this->endTime=$endTime;
}
  
public function setStartTime($startTime) {
    $this->startTime=$startTime;
}
 
public function setDate($date) {
    $this->date=$date;
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

        public function fetchAll(){
            try{
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
                }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            
    
                $stm=$pdo->prepare('SELECT * FROM reservation');
                $stm->execute();
                return $stm->fetchAll();
    
              
    
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    
    
    }

  

?>