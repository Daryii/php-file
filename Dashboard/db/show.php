<?php
    include('connection.php');

    $table_name = $_SESSION['table'];
    
    $stmt = $conn->prepare("SELECT * FROM $table_name ORDER BY updated_at DESC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    return $stmt->fetchAll();
?>   