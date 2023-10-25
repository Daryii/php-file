<?php
    $data = $_POST;
    $id = (int) $data['pid'];


    try {
        $command = "DELETE FROM products WHERE id={$id}";
        include('connection.php');

        $conn->exec($command);
        
        echo json_encode([
            'success' => true,
            'message' => 'successfully deleted.'
        ]);
       
    } catch (PDOException $e) {
        
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
?>

