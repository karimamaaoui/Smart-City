<?php
require_once("Bank.php");
    if (isset($_POST['addbank'])){
    
        $bank=new Bank();
        $bank->setName($_POST['name']);
        $bank->setAddress($_POST['address']);
        $bank->setDescription($_POST['description']);
        $bank->setTel($_POST['tel']);
        $bank->setIdCity($_POST['idCity']);

       
        $bank->addbank();

                echo "<script> alert('bank added successfully');</script>";
                header("location:Banks.php");
            

    
}else {
    echo "<script> alert('nothing');</script>";

}
?>