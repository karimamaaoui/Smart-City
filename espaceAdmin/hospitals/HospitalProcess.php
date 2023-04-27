<?php
require_once("Hospital.php");

    if (isset($_POST['addhospital'])){

        $hospitals=new Hospital();
        $hospitals->setName($_POST['name']);
        $hospitals->setAddress($_POST['address']);
        $hospitals->setDescription($_POST['description']);
        $hospitals->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $hospitals->setIdCity($_POST['idCity']);

       
        $hospitals->addHospital();

                echo "<script> alert('hospital added successfully');</script>";
                header("location:../dashboard.php");
            

    }
?>