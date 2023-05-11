
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


<?php
if (isset($_GET['label'])) {
    $label = $_GET['label'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=smartCity", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM cities WHERE label LIKE ?");
        $stmt->execute(["%$label%"]);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="card">';
                echo '<div class="card-content">';
                echo '<p class="card-text"><img src="../espaceAdmin/profilepics/' . $row['pic'] . '"></p><br/>';
                echo '<h2 class="card-title"> Title: ' . $row["label"] . '</h2><br>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No results";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
