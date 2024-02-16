<?php

$host = "localhost";
$dbname = "swe";
$username = "root";
$password = "";


try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

$productId = $_GET['id'];


$query = "SELECT * FROM products WHERE product_id = ?";
$stmt = $mysqli->prepare($query);


$stmt->bind_param("i", $productId);


$stmt->execute();


$result = $stmt->get_result();

$product = $result->fetch_assoc();


$stmt->close();


if ($product) {
    // Display the product details here, for example:
    echo '<h1>' . $product['product_name'] . '</h1>';
    echo '<p>' . $product['product_desc'] . '</p>';
    echo '<p>Price: $' . $product['price'] . '</p>';
} else {
    echo 'Product not found.';
}
?>