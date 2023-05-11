<?php
require_once("Tourist.php");

    if (isset($_POST['addtourist'])){
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
 
    
        $tourist=new Tourist();
        $tourist->setName($_POST['name']);
        $tourist->setAddress($_POST['address']);
        $tourist->setDescription($_POST['description']);
        $tourist->setTel($_POST['tel']);
       // $hospitals->setIdCity($_POST['idCity']);
        $tourist->setIdCity($_POST['idCity']);
        $tourist->setPic($pic);

       
        $tourist->addTourist();

                echo "<script> alert('tourist place added successfully');</script>";
                header("location:Tourists.php");
            

    }}
?>