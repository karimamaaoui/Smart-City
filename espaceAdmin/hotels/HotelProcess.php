<?php
require_once("Hotel.php");

    if (isset($_POST['addhotel'])){
        $ppic=$_FILES["pic"]['name'];
        $images=$_FILES['pic']['name'];
        $type=$_FILES['pic']['type'];

        var_dump($$_FILES["pic"]['name']);
        var_dump($type);


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
 
        $hotels=new Hotel();
        $hotels->setName($_POST['name']);
        $hotels->setAddress($_POST['address']);
        $hotels->setDescription($_POST['description']);
        $hotels->setTel($_POST['tel']);
        $hotels->setIdCity($_POST['idCity']);
        $hotels->setPic($pic);

       
        $hotels->addHotels();

                echo "<script> alert('hotel added successfully');</script>";
                header("location:../dashboard.php");
            
        }
    }
?>