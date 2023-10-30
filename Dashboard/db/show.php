<?php
include('connection.php');

$table_name = $_SESSION['table'];


// Initialize variables for columns to select
$columns_to_select = '*';

// Check if the table is the "products" table
if ($table_name === 'products') {
    $columns_to_select .= ', JSON_UNQUOTE(JSON_EXTRACT(sizes_and_stock, "$.size")) AS size, JSON_UNQUOTE(JSON_EXTRACT(sizes_and_stock, "$.stock")) AS stock';
}

// Build the SQL query
$sql = "SELECT $columns_to_select FROM $table_name ORDER BY updated_at DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$products = $stmt->fetchAll();

// Now $products contains the size and stock information if it's the "products" table
return $products;
?>
