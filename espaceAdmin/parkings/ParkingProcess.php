<?php
require_once("parking.php");

    if (isset($_POST['addparking'])){
 
    
        $parking=new Parking();
        $parking->setName($_POST['name']);
        $parking->setAddress($_POST['address']);
        $parking->setDescription($_POST['description']);
        $parking->setTel($_POST['tel']);
        $parking->setIdCity($_POST['idCity']);
        $parking->setNumberPlace($_POST['place']);
        $parking->setPrice($_POST['price']);

       
        $parking->addParking();

                echo "<script> alert('parking added successfully');</script>";
                header("location:parkings.php");
            
    }
?>