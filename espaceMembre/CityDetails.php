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
    <link rel="stylesheet" href="../espaceAdmin/admin.css">

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
                <form action="search.php" method="GET">

                    <label>
                        <input type="text" placeholder="Search here" name="search">

                    </label>
                    <input type="submit" value="Search">

                    </form>
                </div>

                <div class="user">
                </div>
            </div>

    <!-- =============== Navigation ================ -->
   
<div class=""> 
            <div class="">
                <div class="">
                    <div class="cardHeader">
                        <h2>City Details </h2>
                        
                    </div>

                    <style>
.button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #ccc;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}
</style>
                 
<?php
$id=$_GET["id"];

    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title">Parking </h2>';
    echo '<p class="card-text"> <img src="../img/undraw_order_a_car_3tww.png" alt="image"> </p> <br/>';
    echo '<a href="ParkingDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';


    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title"> Hospital </h2>';
    echo '<p class="card-text"> <img src="../img/undraw_medicine_b1ol.png" alt="image"> </p> <br/>';
    echo '<a href="HospitalDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';
 
    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title"> Hotel</h2>';
    echo '<p class="card-text"> <img src="../img/undraw_Travel_booking_re_6umu.png" alt="image"> </p> <br/>';
    echo '<a href="HotelsDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';

    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title">Unviversity </h2>';
    echo '<p class="card-text"> <img src="../img/undraw_Educator_re_ju47.png" alt="image"> </p> <br/>';
    echo '<a href="UniversityDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';

    
    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title"> Bank </h2>';
    echo '<p class="card-text"> <img src="../img/undraw_Vault_re_s4my.png" alt="image"> </p> <br/>';
    echo '<a href="BankDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';


    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title"> Tourist Place </h2>';
    echo '<p class="card-text"> <img src="../img/undraw_tourist_map_re_293e.png" alt="image"> </p> <br/>';
    echo '<a href="TouristDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';
 

    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title"> Restaurant </h2>';
    echo '<p class="card-text"> <img src="../img/undraw_special_event_4aj8.png" alt="image"> </p> <br/>';
    echo '<a href="RestaurantDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';

    
    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title"> Police Office </h2>';
    echo '<p class="card-text"> <img src="../img/OIP (2).jpg" alt="image"> </p> <br/>';
    echo '<a href="OfficeDetails.php?id=' . $id. '" class="button">Show Details</a>';
    echo '</div>';
    echo '</div>';
 
?>
<style>
.card {
  display: inline-block;
  margin: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  overflow: hidden;
  width: 300px;
}

.card img {
  display: block;
  width: 100%;
  height: 200px;
}

.card-content {
  padding: 10px;
}

.card-title {
  margin: 0;
  font-size: 24px;
  font-weight: bold;
}

.card-text {
  margin: 0;
  font-size: 18px;
}
</style>

                </div>

            </div>
        </div>
        

                    </div>
    </body>

</html>