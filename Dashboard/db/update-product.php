<?php

    $data = $_POST;
    $user_id = (int) $data['User_id'];
    $Productname = $data['p_name'];

    try {
        $sql = "UPDATE products SET product_naam=?, stock=?, bijgewerkt_op=? WHERE id=?";
        include('connection.php');
        $conn->prepare($sql)->execute([$Productnam, date('Y-m-d h:i:s'), $user_id]);

        echo json_encode([
            'success' => true,
            'message' => 'successfully Updated.'
        ]);
       
    } catch (PDOException $e) {
        
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
       
    }

?>

