<?php
    require_once('../espaceAdmin/cities/cityConfig.php');
    
    session_start();
    $listAllCity=new CityConfig();
    $data=$listAllCity->fetchAll();


    try{
        $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<script src="../main.js"></script>


<body>
<div class="container">
<?php include_once("navbar.php"); ?>

        <div class="">
    
    </div>



<div class="main allContent-section py-4"  >

<div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <ion-icon name=""></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="../img/customer01.jpg" alt="">
                </div>
            </div>

    <!-- =============== Navigation ================ -->
   
<div class=""> 
            <div class="">
                <div class="">
                    <div class="cardHeader">
                        <h2>Checkout </h2>
                        
                    </div>


<form action="process_payment.php" method="POST">
  <label for="card_number">Card Number:</label>
  <input type="text" id="card_number" name="card_number" required><br>
  
  <label for="card_name">Cardholder Name:</label>
  <input type="text" id="card_name" name="card_name" required><br>
  
  <label for="expiration_date">Expiration Date:</label>
  <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/YYYY" required><br>
  
  <label for="cvv">CVV:</label>
  <input type="text" id="cvv" name="cvv" required><br>
  
  <label for="amount">Amount:</label>
  <input type="text" id="amount" name="amount" required><br>
  
  <input type="submit" value="Pay">
</form>
</div>

</div>
</div>


        </div>
        </body>

</html>