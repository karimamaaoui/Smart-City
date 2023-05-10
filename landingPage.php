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
<?php
    require_once('espaceAdmin/cities/cityConfig.php');
    
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
<body>

<!--Header-->
<header>
  <div id="menu-bar" class="fas fa-bars"></div>
  <a href="" class="logo" style="text-decoration: none"><span>S</span>mart City</a>
  <nav class="navbar">
    <a href="#home" style="text-decoration: none">Home</a>
    <a href="#home" style="text-decoration: none">Gallery</a>
    <a href="#home" style="text-decoration: none">Services</a>
    <a href="#home" style="text-decoration: none">Contact</a>
  </nav>
  <div class="icons">
    <i class="fas fa-search" id="search-btn"></i>
    <i class="fas fa-user" id="login-btn"></i>
  </div>

  <form action="" class="search-bar-container">
    <input type="search" id="search-bar" placeholder="search here ..." />
    <label for="search-bar" class="fas fa-search"></label>
  </form>
</header>


<!--End Header-->

<div class="login-form-container">
  <i class="fas fa-close" id="form-close"></i>

  <form action="loginProcess.php" method="post">
    <h3>Login</h3>
    <input type="email" name="email" class="box" placeholder="enter your email" />
    <input type="password" name="password" class="box" placeholder="enter your password" />
    <input type="submit" value="login now" class="btn" name="login" />
    <input type="checkbox" id="remember" />
    <label for="remember">remember me</label>
    <p>forget password ?<a href="">click here</a></p>
    <p>Don't have an account ?<a href="signUp.php">register now</a></p>
  </form>
</div>

<section class="home" id="home">
  <div class="content">
    <h3>Adventure is wothwhile</h3>
    <p>discover new places with us, adventure awaits</p>
    <a href="#" class="btn">discover more</a>
  </div>
  <div class="controls">
    <span class="img-btn active" data-src="img/Monastir-Tunisia.jpg"></span>
    <span class="img-btn" data-src="img/tabarka.jpg"></span>
    <span class="img-btn" data-src="img/bizerte.jpg"></span>
    <span
      class="img-btn"
      data-src="img/theatre_municipal_de_tunis.jpg"
    ></span>
  </div>
  <div class="img-container">
    <img src="img/Monastir-Tunisia.jpg" id="image-slider" />
  </div>
</section>

<section class="packages" id="packages" >
  <h1 class="heading">
    <span>p</span>
    <span>a</span>
    <span>c</span>
    <span>k</span>
    <span>a</span>
    <span>g</span>
    <span>e</span>
    <span>s</span>
  </h1>
  <div class="row">
    <div class="images">
                         
<?php
$sql = "SELECT * FROM cities";
$result = $pdo->query($sql);



if ($result->rowCount() > 0) {
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="card">';
    echo '<div class="card-content">';
    echo '<h2 class="card-title">' . $row["label"] . '</h2>';
    echo '<p class="card-text"> <img src="espaceAdmin/profilepics/' . $row["pic"]  . '" alt="' . $row["pic"]  . ' height="100px" width="100px"""> </p> <br/>';

    echo '</div>';
    echo '</div>';
  }
} else {
  echo "No results";
}
?>
    </div>
    
  </div>
</section>
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



<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-text">
                <p class="footer-desc">
                    Plan and book your perfect trip with
                    expert advice, travel tips destination
                    information from us
                </p>
                <p class="copyright">©2023 Thousand Sunny. All rights reserved</p>
            </div>
            <div class="nav-footer">
                <div class="nav-footer-col">
                    <h4 class="nav-footer-title">Destinations</h4>
                    <ul class="nav-footer-links">
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Tunisia</a>
                        </li>
                       </ul>
                </div>
                <div class="nav-footer-col">
                    <h4 class="nav-footer-title">Interests</h4>
                    <ul class="nav-footer-links">
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Place Tourist</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Restaurant</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Hotels</a>
                        </li>
                        <li class="nav-footer-item">
                            <a href="#" class="nav-footer-link">Hospital</a>
                        </li>
                       </ul>
                </div>
            </div>
            <div class="social-media">
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/twitter.svg" class="icon" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/facebook.svg" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/instagram.svg" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/linkedin.svg" alt="">
                </a>
                <a href="#" class="social-link">
                    <img src="assets/img/social-media/youtube.svg" alt="">
                </a>
            </div>
        </div>
    </div>
</footer>
<!--Footer-->

<div class="arrow-up"><i><</i></div>


<script src="script.js"></script>
</body>
</html>
