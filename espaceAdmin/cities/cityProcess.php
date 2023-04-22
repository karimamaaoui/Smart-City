<?php
require_once("cityConfig.php");

    if (isset($_POST['addcity'])){

        $cities=new CityConfig();
        $cities->setLabel($_POST['label']);
       
        $cities->addCity();

        echo "<script> alert('city added successfully');</script>";
        header("location:../dashboard.php");

            

    }
?>