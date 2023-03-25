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
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<h1> please signup</h1>

<form action="signupProcess.php" method="post">
<input type="email" name="email" class="box" placeholder="enter your email" />
    <br>
    <br>

    <input type="text" name="username" class="box" placeholder="enter your username" />
    <br>
    <br>
   
    <input type="password" name="password" class="box" placeholder="enter your password" />
    <br>
    <br>
    <input type="submit" value="login now" class="btn" name="signup" />
    <br>
  </form>
</body>
</html>