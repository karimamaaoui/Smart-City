

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

require_once('PoliceStation.php');

$record=new PoliceStation();

session_start();
try{
    $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e)
{
    echo $e->getMessage();
}


if (isset($_GET['id'])) {
    if ($_GET['req'] == "update") {
        $record->setId($_GET['id']);
        $id = $record->getId();
        $sql = "SELECT * FROM policestation WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->execute(array(':id' => $id));

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['name'];
            $description = $row['description'];
            $tel = $row['tel'];
            $address = $row['address'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            

            $record->update();
            $_SESSION['statusupdate'] = "";


            header("Location: PoliceStations.php");
        }

    }
}
?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Police Station</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="box" placeholder="Enter name" /><br><br>

                    <label for="adr">Address</label>
                    <input type="text" name="address" class="box" value="<?php echo $address; ?>" placeholder="Enter address" /><br><br>

                    <label for="des">Description</label>
                    <input type="text" name="description" value="<?php echo $description; ?>" class="box" placeholder="Enter description" /><br><br>

                    <label for="tel">Tel</label>
                    <input type="tel" name="tel" value="<?php echo $tel; ?>" class="box" placeholder="Enter tel" /><br><br>
                  </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update Police Station</button>
                </div>
            </form>
        </div>
    </div>
</div>

