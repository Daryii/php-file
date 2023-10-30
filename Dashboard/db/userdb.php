<?php
    //Start the session
    session_start();
    ob_start();

    // capture the table mapping
    include('table-columns.php');
    

    //capture the table name.
    $table_name = $_SESSION['table'];
    $columns = $table_columns_mapping[$table_name];

 
    //loop thourght the columns
    $db_arr = [];
    $user = $_SESSION['user'];

    foreach ($columns as $column) {
        // Remove any extra spaces from the column name
        $column = trim($column);

        if (in_array($column, ['updated_at']) || in_array($column, ['created_at'])) {
            $value = date('Y-m-d H:i:s');
        } elseif ($column == 'password') {
            $value =  password_hash($_POST[$column], PASSWORD_DEFAULT);
        } elseif ($column == 'img') {


            // Upload or move the file to our directory
            $target_dir = "../uploads/products/";
            $file_data = $_FILES[$column];
            $file_name = $file_data['name'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_name = 'product-' . time() . '.' . $file_ext;

            $check = getimagesize($file_data['tmp_name']);

            // Move the file
            if ($check){
                if(move_uploaded_file($file_data['tmp_name'], $target_dir . $file_name)) {
                    // save the file_name to the db.
                    $value = $file_name;
                }
            } else {
                // Do not move the file
            }
        } else {
            $value = isset($_POST[$column]) ? $_POST[$column] : '';
        }
        
        $db_arr[$column] = $value;
    }
    
    
    $table_properties = implode(", ",  array_keys($db_arr));
    $table_placeholders = rtrim(str_repeat("?, ", count($db_arr)), ", ");
         


    try {
        $sql = "INSERT INTO $table_name (`id`, $table_properties) VALUES (NULL, $table_placeholders)";

        include('connection.php');

        $conn->beginTransaction();

        $stmt = $conn->prepare($sql);
        $stmt->execute(array_values($db_arr)); 

        $conn->commit();

        $response = [
            'success' => true,
            'message' => 'successfully added to the system.'
        ];
        
    } catch (PDOException $e) {

        $conn->rollBack();

        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }

    $_SESSION['response'] = $response;
    header('location: ../' . $_SESSION['redirect_to']);
    ob_end_flush();
    
?>