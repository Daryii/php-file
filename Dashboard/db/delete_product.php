<?php
    $data = $_POST;
    $user_id = (int) $data['user_id'];



    try {
        $command = "DELETE FROM products WHERE id={$user_id}";
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

