<?php
require_once("Hotel.php");

    if (isset($_POST['addhotel'])){

        $hotels=new Hotel();
        $hotels->setName($_POST['name']);
        $hotels->setAddress($_POST['address']);
        $hotels->setDescription($_POST['description']);
        $hotels->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $hotels->setIdCity($_POST['idCity']);

       
        $hotels->addHotels();

                echo "<script> alert('hotel added successfully');</script>";
                header("location:../dashboard.php");
            

    }
?>