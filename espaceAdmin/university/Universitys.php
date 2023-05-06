<?php
    require_once('University.php');
    
    session_start();
    $listAllUniversity=new University();
    $data=$listAllUniversity->fetchAll();

    require_once("../../connect.php");

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
                    <div class="cardHeader">
                        <h2>University Lists</h2>
                        <a href="university/createUniversity.php" class="btn">Create New University</a>
                        
                    </div>

                    <table id="users">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Address</td>
                                <td>Description</td>
                                <td>Tel</td>
                                <td>Id City</td>
                                <td>Picture</td>

                                <td>Action</td>
                              
                            </tr>
                        </thead>
                    <?php 
                    
    
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>University Deleted Successfuly</strong> 
                                <?= $_SESSION['status']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php 
                        unset($_SESSION['status']);
                    }
                    if(isset($_SESSION['statusupdate']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>University Updated Successfuly</strong> 
                                <?= $_SESSION['statusupdate']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php 
                        unset($_SESSION['statusupdate']);
                    }
                
                    foreach ($data as $key => $val) {
                        ?>
                        
                        <tbody>
                            <tr>
                                
                                <td ><?php echo $val['name'] ?></td>

                                <td ><?php echo $val['address'] ?></td>
                                <td ><?php echo $val['description'] ?></td>
                                <td ><?php echo $val['tel'] ?></td>
                                <td ><?php echo $val['idCity'] ?></td>
                                <td><img src="../espaceAdmin/profilepics/<?php  echo $val['pic'];?>" width="80" height="80"></td>

                                <td>
                                <a href="university/updateUniversity.php?id=<?php echo $val['id']?>&req=update">
                                <input type="button" class="btn btn-warning" value="Update" >
                                 </a>
                                <a href="university/deleteUniversity.php?id=<?php echo $val['id']?>&req=delete">
                                <input value="Delete" type="button" class="btn btn-danger"></a>
                                
                            </td>
                            </tr>
                        <?php } ?>
                           </tbody>
                    </table>
                </div>

            </div>
        </div>
        

                    </div>
    </body>

</html>