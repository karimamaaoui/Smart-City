<?php
require_once("Restaurant.php");

    if (isset($_POST['addRestaurant'])){

        $resto=new Restaurant();
        $resto->setName($_POST['name']);
        $resto->setAddress($_POST['address']);
        $resto->setDescription($_POST['description']);
        $resto->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $resto->setIdCity($_POST['idCity']);

       
        $resto->addRestaurant();

                echo "<script> alert('Restaurant added successfully');</script>";
                header("location:../dashboard.php");
            

    }
?>