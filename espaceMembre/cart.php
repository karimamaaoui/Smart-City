<?php

    try{
        $pdo=new PDO("mysql:host=localhost;dbname=smartCity","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Reservation Cart</h1>

    <table>
        <thead>
            <tr>
                <th>Parking Name</th>
                <th>Price</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

$query = "SELECT p.*, r.date
FROM parking p
JOIN reservation r ON p.id = r.parkingId";
$stmt = $pdo->query($query);

// Fetch the results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Process the results
foreach ($results as $row) {
    // Access the columns from both tables
    $parkingId = $row['id'];
    $parkingName = $row['name'];
    $reservationDate = $row['date'];

    // Display the information as needed
    echo "Parking ID: $parkingId<br>";
    echo "Parking Name: $parkingName<br>";
    echo "Reservation Date: $reservationDate<br>";
    echo "<br>";
}
            // Get the cart items
       /*     $cartItems = getCartItems();

            // Loop through the cart items and display them in the table
            foreach ($cartItems as $productId => $quantity) {
                // Retrieve product details from the database based on the product ID
                // Replace this with your own database query logic
                $productName = getProductDetails($productId)['name'];

                echo "<tr>";
                echo "<td>$productId</td>";
                echo "<td>$productName</td>";
                echo "<td>$quantity</td>";
                echo "<td><a href='remove_from_cart.php?product_id=$productId'>Remove</a></td>";
                echo "</tr>";
            }*/
            ?>
        </tbody>
    </table>

    <br>
    <a href="payment.php">Proceed to Checkout</a>
</body>
</html>
