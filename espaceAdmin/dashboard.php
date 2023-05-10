<?php
    require_once('../loginConfig.php');
    
    session_start();
    $listAllUsers=new LoginConfig();
    $data=$listAllUsers->fetchAll();

    require_once("../connect.php");

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
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
        <?php 
        include "sidebar.php";
     ?>

    </div>

        <!-- ========================= Main ==================== -->
        <div class="main allContent-section py-4"  >
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

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                        $sql="SELECT * from user ";
                        $result=$pdo-> query($sql);
                        $count=0;
                        if ($result->rowCount() > 0){
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                $count=$count+1;
                            }
                        }

                        echo $count;
                    ?>


                        </div>
                        <div class="cardName">Total Users</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">  
                             <?php
                       
                       $sql="SELECT * from cities";
                       $result=$pdo-> query($sql);
                       $count=0;
                       if ($result->rowCount() > 0){
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $count=$count+1;
                        }
                    }

                   echo $count;
                   ?>
                 </div>
                        <div class="cardName">Total Cities</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                       
                       $sql="SELECT * from cities";
                       $result=$pdo-> query($sql);
                       $count=0;
                       if ($result->rowCount() > 0){
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $count=$count+1;
                        }
                    }

                   echo $count;
                   ?>
                        </div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                        <?php
                       
                       $sql="SELECT * from cities";
                       $result=$pdo-> query($sql);
                       $count=0;
                       if ($result->rowCount() > 0){
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $count=$count+1;
                        }
                    }

                   echo $count;
                   ?>
                        </div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="sectionUser"> 
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Users List</h2>
                        <a href="../users/create.php" class="btn">Create New User</a>
                        
                    </div>

                    <table id="users">
                        <thead>
                            <tr>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Action</td>
                              
                            </tr>
                        </thead>
                    <?php 
                    
    
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>User Deleted Successfuly</strong> 
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
                                <strong>User Updated Successfuly</strong> 
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
                                
                                <td ><?php echo $val['username'] ?></td>
                                <td><?php echo $val['email']   ?></td>
                                <td><?php echo $val['roleId'] ?></td>
                                <td>
                                <a href="../users/update.php?id=<?php echo $val['id']?>&req=update">
                                <input type="button" class="btn btn-warning" value="Update" >
                                 </a>
                                <a href="../users/delete.php?id=<?php echo $val['id']?>&req=delete">
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
    </div>
    <?php
            if (isset($_GET['cities']) && $_GET['cities'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['cities']) && $_GET['cities'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
          ?>


    <!-- =========== Scripts =========  -->
    <script type="text/javascript" src="ajaxWork.js"></script>    

    <script type="text/javascript" src="main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




</body>

</html>