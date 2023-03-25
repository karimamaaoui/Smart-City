<?php

?>

<!Doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart City</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
  />
  <link rel="stylesheet" href="css/login.css" />
</head>
<body >

<div class="login-form-containe">

  <form action="loginProcess.php" method="post" style="width:30%;height:360px;" >
    <h3>Login</h3>
    <input type="email" name="email" class="box" placeholder="enter your email" />
    <input type="password" name="password" class="box" placeholder="enter your password" />
    <input type="submit" value="login now" class="btn" name="login" />
    <input type="checkbox" id="remember" />
    <label for="remember">remember me</label>
    <p>forget password ?<a href="">click here</a></p>
    <p>Don't have an account ?<a href="signup.php">register now</a></p>
  </form>
</div>

</body>
</html>