<?php
require_once("University.php");

    if (isset($_POST['adduniversity'])){

        $university=new University();
        $university->setName($_POST['name']);
        $university->setAddress($_POST['address']);
        $university->setDescription($_POST['description']);
        $university->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $university->setIdCity($_POST['idCity']);

       
        $university->addUniversity();

                echo "<script> alert('university added successfully');</script>";
                header("location:../dashboard.php");
            

    }
?>