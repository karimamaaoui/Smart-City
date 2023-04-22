

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


?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create new User</h2>
    </div>
    <div class="card-body">

    <div class="">

<form action="../signupProcess.php" method="post" style="width:30%;height:450px;">

<input type="email" name="email" class="box" placeholder="enter your email" />
    <br>
    <br>

    <input type="text" name="username" class="box" placeholder="enter your username" />
    <br>
    <br>
   
    <input type="password" name="password" class="box" placeholder="enter your password" />
    <br>
    <br>
    <input type="submit" value="Add" class="btn" name="adduser" />
    <br>
  </form>
</div>
   
</div>
  </div>
</div>