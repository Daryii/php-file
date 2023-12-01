<?php

    $data = $_POST;
    $user_id = (int) $data['User_id'];
    $Productname = $data['p_name'];
    $img = $data['img'];
    $supplier_url = $data['supplierurl'];
    $webshop_url = $data['webshopurl'];
    $voorraad = $data['voorraad'];

    try {
        $sql = "UPDATE products SET product_naam=?, voorraad=?, supplier_url=?, webshop_url=? WHERE id=?";
        include('connection.php');
        $conn->prepare($sql)->execute([$Productname, $img, $voorraad, $supplier_url, $webshop_url, $user_id]);

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

