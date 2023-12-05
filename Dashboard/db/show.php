<?php
include('connection.php');

// Get the selected "maat" from the request
$selectedMaat = isset($_POST['maat']) ? $_POST['maat'] : null;

$table_name = $_SESSION['table'];

if ($selectedMaat) {
    // If a "maat" is selected, retrieve the "voorraad" for that "maat"
    $sql = "SELECT * FROM $table_name WHERE maat = :maat";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':maat', $selectedMaat);
} else {
    // If no "maat" is selected, retrieve all products
    $sql = "SELECT * FROM $table_name";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

// Fetch the data into an array
$products = $stmt->fetchAll();

// Return the array of products
return $products;
?>