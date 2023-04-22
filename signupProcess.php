<?php
require_once("signupConfig.php");

    if (isset($_POST['signup'])){

        $signup=new SignUpConfig();
        $signup->setUsername($_POST['username']);
        $signup->setEmail($_POST['email']);
        $signup->setPassword($_POST['password']);

        if($signup->checkUser($_POST['email'])){
            echo "<script> alert('user exist please login');document.location='login.php'</script>";

        }
        else {
            $signup->insertData();
            echo "<script> alert('user created');document.location='login.php'</script>";
            }

    }


    if (isset($_POST['adduser'])){

        $signup=new SignUpConfig();
        $signup->setUsername($_POST['username']);
        $signup->setEmail($_POST['email']);
        $signup->setPassword($_POST['password']);

        if($signup->checkUser($_POST['email'])){
            echo "<script> alert('user exist please login');document.location='espaceAdmin/dashboard.php'</script>";

        }
        else {
            $signup->addUser();
            echo "<script> alert('user created');document.location='espaceAdmin/dashboard.php'</script>";
            }

    }
?>