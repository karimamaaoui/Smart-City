

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

</head>
<body>
</body>
</html>


<?php

require_once('cityConfig.php');
require_once("../../connect.php");

$record=new CityConfig();

session_start();
try{
    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
    echo $e->getMessage();
}


//after insert or update 
if(isset($_GET['id'] )){

    if($_GET['req']=="update"){
        $record->setId($_GET['id']);
        $id=$record->getId();
        $sql = "SELECT * FROM cities WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->execute(array(':id' => $id));

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $label = $row['label'];
        }
        $record->update();
        
        $_SESSION['statusupdate'] = "<Type Your success message here>";
        
        
    }}

?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update City</h2>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <label for="name">Label</label>
          <input value="<?php echo $label;?>" type="text" name="label" id="label" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update City</button>
        </div>
      </form>
    </div>
  </div>
</div>