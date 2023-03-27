
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
</body>
</html>

<?php

require_once('../LoginConfig.php');

$record=new LoginConfig();
//echo $_GET['id']."<br>";
//echo  $_GET['req'];
session_start();

//after insert or update 
if(isset($_GET['id'] )){
    if($_GET['req']=="delete"){
        $record->setId($_GET['id']);
        $record->delete();
        $_SESSION['status'] = "<Type Your success message here>";

      echo "
            <script>
            
            document.location='../espaceAdmin/dashboard.php'</script>";
        
    }}

?>
 <!-- <script> swal({
            title: 'Good job!',
            text: 'You clicked the button!',
            icon: 'success',
            button: 'Aww yiss!',
            });</script>
       
       -->