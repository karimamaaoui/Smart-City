
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

require_once('cityConfig.php');

$record=new CityConfig();

session_start();

if(isset($_GET['id'] )){
    if($_GET['req']=="delete"){
        $record->setId($_GET['id']);
        $record->delete();
        $_SESSION['status'] = "<Type Your success message here>";

      echo "
            <script>
            
            document.location='cities.php'</script>";
        
    }}

?>