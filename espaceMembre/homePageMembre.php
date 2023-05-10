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
                    
                </div>

            </div>

    <!-- =============== Navigation ================ -->
   
<div class=""> 

            <div class="">
                <div class="">
                    <div class="cardHeader">
                        <h2>City Lists</h2>
                        
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
$sql = "SELECT * FROM cities";
$result = $pdo->query($sql);

// Output cards


if ($result->rowCount() > 0) {
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title">' . $row["label"] . '</h2>';
    echo '<p class="card-text"> <img src="../espaceAdmin/profilepics/' . $row["pic"]  . '" alt="' . $row["pic"]  . '"> </p> <br/>';
    echo '<a href="CityDetails.php?id=' . $row["id"] . '" class="button">Show Details</a>';

    echo '</div>';
    echo '</div>';
  }
} else {
  echo "No results";
}
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