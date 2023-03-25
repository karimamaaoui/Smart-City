<?php

try{
        $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");

    }catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>