<?php
require_once("PoliceStation.php");

    if (isset($_POST['addPolicestation'])){
        
        $ppic=$_FILES["pic"]['name'];
        $images=$_FILES['pic']['name'];
        $type=$_FILES['pic']['type'];

       
        // get the image extension
        $extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
        // allowed extensions
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if(!in_array($extension,$allowed_extensions))
        {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
       
        else
        {

            //rename the image file
        $pic=md5($imgfile).time().$extension;
        // Code for move image into directory
        move_uploaded_file($_FILES["pic"]["tmp_name"],"../profilepics/".$pic);
 
   
        $polices=new PoliceStation();
        $polices->setName($_POST['name']);
        $polices->setAddress($_POST['address']);
        $polices->setDescription($_POST['description']);
        $polices->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $polices->setIdCity($_POST['idCity']);
        $polices->setPic($pic);

       
        $polices->addPoliceStation();

                echo "<script> alert('Police Station added successfully');</script>";
                header("location:../dashboard.php");
            
        }
    }
?>