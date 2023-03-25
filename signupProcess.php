<?php
    if (isset($_POST['signup'])){

        require_once("signupConfig.php");

        $signup=new SignUpConfig();
        $signup->setUsername($_POST['username']);
        $signup->setEmail($_POST['email']);
        $signup->setPassword($_POST['password']);
        
        $signup->insertData();
        echo "<script> alert('user created');document.location='hello.html'</script>";

    }
?>