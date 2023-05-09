<?

class Reservation {
    private $id;
    private $userId;
    private $spaceId;
    private $date;
    private $startTime;
    private $endTime;
    private $numSpaces;
    
    public function __construct($id, $userId, $spaceId, $date, $startTime, $endTime, $numSpaces) {
        $this->id = $id;
        $this->userId = $userId;
        $this->spaceId = $spaceId;
        $this->date = $date;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->numSpaces = $numSpaces;
    }
    
    public function makeReservation() {
        // check if the selected parking space is available for the given date and time range
        if (!$this->isSpaceAvailable()) {
            throw new Exception("The selected parking space is not available for the selected time range.");
        }
        
        // make the reservation by inserting a new row into the reservations table
        $query = "INSERT INTO reservations (user_id, space_id, date, start_time, end_time, num_spaces) VALUES ($this->userId, $this->spaceId, '$this->date', '$this->startTime', '$this->endTime', $this->numSpaces)";
        // execute the query using a database connection object
        
        // update the status of the selected parking space to "reserved"
        $query = "UPDATE parking_spaces SET status = 'reserved' WHERE id = $this->spaceId";
        // execute the query using a database connection object
        
        // update the available count of parking spaces for the selected parking lot and time range
        $lotId = $this->getSpace()->getLotId();
        $availableCount = ParkingSpace::getAvailableCount($lotId, $this->date, $this->startTime, $this->endTime);
        $query = "UPDATE availability SET count = $availableCount WHERE lot_id = $lotId AND date = '$this->date' AND start_time = '$this->startTime'";
        // execute the query using a database connection object
    }
    
    public function isSpaceAvailable() {
        // check if the selected parking space is available for the given date and time range
        $availableCount = ParkingSpace::getAvailableCount($this->getSpace()->getLotId(), $this->date, $this->startTime, $this->endTime);
        return $availableCount >= $this->numSpaces;
    }
    
    // getters and setters for the class properties
    public function getId() {
        return $this->id;
    }
    
    public function getUserId() {
        return $this->userId;
    }
    
    public function getSpaceId() {
        return $this->spaceId;
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
    
    public function getNumSpaces() {
        return $this->numSpaces;
    }
    
    public function getSpace() {
        // retrieve the parking space object for the selected space id from the database
        $query = "SELECT * FROM parking WHERE id = $this->spaceId";
        // execute the query using a database connection object
        // fetch the result and create a new ParkingSpace object with the result data
        $result = $db->query($query);
        $data = $result->fetch_assoc();
        $space = new ParkingSpace($data['id'], $data['lot_id'], $data['name'], $data['description'], $data['status']);
        return $space;
    }

}
?>