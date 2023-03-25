<?php
    if (isset($_POST['login'])){

        require_once("loginConfig.php");

        $info=new LoginConfig();
        $info->setEmail($_POST['email']);
        $info->setPassword($_POST['password']);
        
        $login=$info->login();
        if($login){
            echo "<script> alert('user exist');</script>";

        }
        else {
            echo "<script> alert('user not found ');</script>";

        }

    }
?>