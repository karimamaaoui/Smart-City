<?php
require_once("PoliceStation.php");

    if (isset($_POST['addPolicestation'])){

        $polices=new PoliceStation();
        $polices->setName($_POST['name']);
        $polices->setAddress($_POST['address']);
        $polices->setDescription($_POST['description']);
        $polices->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $polices->setIdCity($_POST['idCity']);

       
        $polices->addPoliceStation();

                echo "<script> alert('Police Station added successfully');</script>";
                header("location:../dashboard.php");
            

    }
?>