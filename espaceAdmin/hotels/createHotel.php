<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">

</head>
<script src="../main.js"></script>
<?php

require_once('../cities/cityConfig.php');
require_once("../../connect.php");

try{
    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
    echo $e->getMessage();
}

session_start();
$listAllCity=new CityConfig();
$data=$listAllCity->fetchAll();


    
  
            

?>
<body>


<div class="sectionCity">
<div class="cities-form-containe">

<form action="HotelProcess.php" method="post" style="width:30%;height:450px;">
<h3>  Add new Hotel</h3>
<input type="text" name="name" class="box" placeholder="enter name" />
    <br>
    <br>
    <input type="text" name="address" class="box" placeholder="enter address" />
    <br>
    <br>
    <input type="text" name="description" class="box" placeholder="enter description" />
    <br>
    <br>
    <input type="tel" name="tel" class="box" placeholder="enter tel" />
    <br>
    <br>

    <select name="idCity" id="Hospital">
    <option value="">Select City</option>

<?php
                       
                       $sql="SELECT * from cities";
                       $result=$pdo-> query($sql);
                       $count=0;
                       if ($result->rowCount() > 0){
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>

<option value="<?php echo $row['id'] ?>"><?php echo $row['label']; ?></option>

                       
                       <?php
                        }
                    }

                    ?>


  

   
</select>
    <br>
    <br>

    <input type="submit" value="Add" class="btn" name="addhotel" />
</form>
</div>
</div>
</body>
</html>