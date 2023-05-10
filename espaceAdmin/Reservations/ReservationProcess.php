<?php
require_once("Reservation.php");
try{
  $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
  echo $e->getMessage();
}

if (isset($_POST['makeResv'])){
 
    $reservation = new Reservation(
    $_POST['userId'],
    $_POST['parkingId'],
    $_POST['date']);

    $parkingId = $_POST['parkingId'];

    $stmt = $pdo->prepare("SELECT * FROM parking WHERE id = ?");
    $stmt->execute([$parkingId]);
    $parking = $stmt->fetch(PDO::FETCH_ASSOC);
  

  if ($parking) {
    $availablePlaces = $parking['numberPlace'];

    if ($availablePlaces > 0) {
        $updatedPlaces = $availablePlaces - 1;

        $stmt = $pdo->prepare("UPDATE parking SET numberPlace = ? WHERE id = ?");
        $stmt->execute([$updatedPlaces, $parkingId]);

        $reservation->makeReservation();

        echo "<script> alert('reservation added successfully');</script>";
        header("location:../../espaceMembre/homePageMembre.php");
    } else {
        echo "Sorry, no available parking places.";
    }
} else {
    echo "Invalid parking space ID.";
}

            
    }
?>