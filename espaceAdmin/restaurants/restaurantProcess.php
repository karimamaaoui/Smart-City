<?php
require_once("Restaurant.php");

    if (isset($_POST['addRestaurant'])){
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
 
   
        $resto=new Restaurant();
        $resto->setName($_POST['name']);
        $resto->setAddress($_POST['address']);
        $resto->setDescription($_POST['description']);
        $resto->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $resto->setIdCity($_POST['idCity']);

        $resto->setPic($pic);

        $resto->addRestaurant();

                echo "<script> alert('Restaurant added successfully');</script>";
                header("location:Restaurants.php");
            
        }
    }
?>