<?php
    require_once('Reservation.php');
    
    session_start();
    $listAllReservation = new Reservation($userId=0, $parkingId=0, $date="");
    $data=$listAllReservation->fetchAll();


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
    <link rel="stylesheet" href="../admin.css">

</head>
<script src="../main.js"></script>


<body>

<div class="">
<div class="cardHeader">
    <a href="../dashboard.php" class="btn">Retour</a>
                        
</div>

<div class=""  >

<div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="../img/customer01.jpg" alt="">
                </div>
            </div>


    <!-- =============== Navigation ================ -->
   
<div class="sectionUser"> 
            <div class="details">
                <div class="recentOrders">
                    <div clas="cardHeader">
                        <h2>Reservation Lists</h2>
                        
                    </div>

                    <table id="users">
        <thead>
            <tr>
                <td>Parking Id</td>
                <td>User Id</td>
                <td>Date</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        <?php 
                    
    
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hospital Deleted Successfuly</strong> 
                                <?= $_SESSION['status']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php 
                        unset($_SESSION['status']);
                    }
                   
                    foreach ($data as $key => $val) {
                        ?>
                <tr>
                    <td><?php echo $val['parkingId'] ?></td>
                    <td><?php echo $val['userId'] ?></td>
                    <td><?php echo $val['date'] ?></td>
                    <td>
    <a>
        <input value="Delete" type="button" class="btn btn-danger">
    </a>
</td>

             
                </tr>
            <?php } ?>
        </tbody>
    </table></div>

            </div>
        </div>
        

                    </div>
    </body>

</html>