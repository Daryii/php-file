<?php
include('connection.php');

$table_name = $_SESSION['table'];

// Use a JOIN operation to fetch size information
$sql = "SELECT products.*, sizes.size as maat 
        FROM $table_name
        LEFT JOIN sizes ON products.id = sizes.product_id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

// Fetch the data into an array
$products = $stmt->fetchAll();

// Return the array of products
return $products;

?>
