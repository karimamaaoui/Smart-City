<?php
    if (isset($_POST['signup'])){

        require_once("signupConfig.php");

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
?>