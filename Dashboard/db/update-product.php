<?php

    $data = $_POST;
    $user_id = (int) $data['user_id'];
    $Productname = $data['p_name'];
    $Description = $data['Description'];
    $created_by = $data['created_by'];
    $Image = $data['img'];

    // try {
        $sql = "UPDATE products SET product_name=?, description=?, created_by=?, img=? WHERE id=?";
        include('connection.php');
        $conn->prepare($sql)->execute([$Productname, $Description, $created_by, date('Y-m-d h:i:s'), $user_id, $Image]);

        echo json_encode([
            'success' => true,
            'message' => 'successfully Updated.'
        ]);
       
    // } catch (PDOException $e) {
        
        echo json_encode([
            'success' => false,
            'message' => 'Error processing your request!'
        ]);
       
    // }

?>

