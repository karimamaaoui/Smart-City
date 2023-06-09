

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

require_once('../LoginConfig.php');
require_once("../connect.php");

$record=new LoginConfig();

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
        $sql = "SELECT * FROM user WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->execute(array(':id' => $id));

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $username = $row['username'];
            $email = $row['email'];
        }
        $record->update();
        
        $_SESSION['statusupdate'] = "<Type Your success message here>";
        
        
    }}

?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <label for="name">Username</label>
          <input value="<?php echo $username;?>" type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?php echo $email;?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update user</button>
        </div>
      </form>
    </div>
  </div>
</div>