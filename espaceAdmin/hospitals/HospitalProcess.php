<?php
require_once("Hospital.php");

    if (isset($_POST['addhospital'])){
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
    
        $hospitals=new Hospital();
        $hospitals->setName($_POST['name']);
        $hospitals->setAddress($_POST['address']);
        $hospitals->setDescription($_POST['description']);
        $hospitals->setTel($_POST['tel']);
        $hospitals->setIdCity($_POST['idCity']);
        $hospitals->setPic($pic);

       
        $hospitals->addHospital();

                echo "<script> alert('hospital added successfully');</script>";
                header("location:../dashboard.php");
            

    }}
?>