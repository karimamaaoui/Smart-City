<?php
require_once("Tourist.php");

    if (isset($_POST['addtourist'])){

        $tourist=new Tourist();
        $tourist->setName($_POST['name']);
        $tourist->setAddress($_POST['address']);
        $tourist->setDescription($_POST['description']);
        $tourist->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $tourist->setIdCity($_POST['idCity']);

       
        $tourist->addTourist();

                echo "<script> alert('tourist place added successfully');</script>";
                header("location:../dashboard.php");
            

    }
?>