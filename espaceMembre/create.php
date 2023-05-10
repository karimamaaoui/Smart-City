<?php
    session_start();

    try{
        $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOException $e)
    {
        echo $e->getMessage();
    }


?>


<!DOCTYPE html>
<html>
<head>
    <title>Reservation Form</title>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php include_once("navbar.php"); ?>
  <div class="card mt-5">
    <div class="card-header">
    <h2>Make a Reservation</h2>
    </div>
    <div class="card-body">

    <div class="">


<?php

$username= $_SESSION['username'];
//echo $username;
$sql = "SELECT * FROM `user` WHERE username ='$username'";

$results = $pdo->query($sql);

// Output cards


if ($results->rowCount() > 0) {
  while($rows = $results->fetch(PDO::FETCH_ASSOC)) {
     $id = $rows['id'];
     //echo $id;
  ?>
    <form action="../espaceAdmin/Reservations/ReservationProcess.php" method="post">

        <input type="hidden"  name="userId" value="<?php echo $id ;?>" required><br>

        <input type="hidden"  name="parkingId" value="<?php echo $_GET["id"]; ?>" required><br>

<label for="email">Date :</label>

<input type="date" name="date" required><br>
<br>
     <br>      
        

        <input type="submit" name="makeResv" value="Make Reservation">
        <?php
        }
    } else {
      echo "No results";
    }
    ?>
        
    </form>
</div></div></div></div>
</body>
</html>
