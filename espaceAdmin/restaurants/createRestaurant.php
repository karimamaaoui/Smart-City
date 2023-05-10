<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<script src="../main.js"></script>
<?php

require_once('../cities/cityConfig.php');

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


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <h3>  Add new Restaurant</h3>
    </div>
    <div class="card-body">

    <div class="">

<form action="restaurantProcess.php" method="post" style="width:30%;height:450px;" enctype="multipart/form-data">
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
    <input type="file" class="form-control" name="pic"  required="true">
        	<span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        
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

    <input type="submit" value="Add" class="btn" name="addRestaurant" />
</form>
</div>
</div>

</div>
</div>
</div>
</div>
</body>
</html>