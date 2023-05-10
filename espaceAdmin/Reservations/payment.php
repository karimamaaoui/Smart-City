<?php
class Payment {
    private $id;
    private $reservationId;
    private $amount;
    private $paymentDate;

    public function __construct( $reservationId, $amount, $paymentDate) {
        $this->id = 0;
        $this->reservationId = $reservationId;
        $this->amount = $amount;
        $this->paymentDate = $paymentDate;
    }

    public function getId() {
        return $this->id;
    }

    public function getReservationId() {
        return $this->reservationId;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getPaymentDate() {
        return $this->paymentDate;
    }

    public function savePayment() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO payments (reservation_id, amount, payment_date) VALUES (?, ?, Now()");
            $stmt->execute([$this->reservationId, $this->amount, $this->paymentDate]);

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>