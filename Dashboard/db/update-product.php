<?php

    $data = $_POST;
    $user_id = (int) $data['User_id'];
    $Productname = $data['p_name'];
    $Description = $data['Description'];
    $Stock = $data['stock_p'];
    $created_by = $data['created_by'];
    // $Image = $data['Image']; img=?, $Image, 
 
    try {
        $sql = "UPDATE products SET product_name=?, stock=?, description=?, created_by=?, updated_at=? WHERE id=?";
        include('connection.php');
        $conn->prepare($sql)->execute([$Productname, $Stock, $Description , $created_by, date('Y-m-d h:i:s'), $user_id]);

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

