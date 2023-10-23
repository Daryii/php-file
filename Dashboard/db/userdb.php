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

        if (in_array($column, ['created_at', 'updated_at'])) {
            $value = date('Y-m-d H:i:s');
        } elseif ($column == 'created_by') {
            $value = $user['id'];
        } elseif ($column == 'password') {
            $value =  password_hash($_POST[$column], PASSWORD_DEFAULT);
        } elseif ($column == 'img') {
            // Upload or move the file to our directory
            $target_dir = "upload/products/";
            $file_data = $_FILES[$column];

            $file_name = $file_data['name'];
            $check = getimagesize($file_data['tmp_name']);

            // Move the file
            if ($check){
                if(move_uploaded_file($file_data['tmp_name'], $target_dir)) {
                    // save the file_name to the db.
                    $value = $file_name;
                }
           
            } else{
                // Do not move the file
            }
        } else {
            $value = isset($_POST[$column]) ? $_POST[$column] : '';
        }


        var_dump($column, $value);
        die;
        $db_arr[$column] = $value;
    }

    
    $table_properties = implode(", ",  array_keys($db_arr));
    $table_placeholders = ':' . implode(", :", array_keys($db_arr));
         


    try {
       $sql = "INSERT INTO 
                    $table_name ($table_properties) 
                                VALUES ($table_placeholders)";

        include('connection.php');

        $stmt = $conn->prepare($sql);
        $stmt->execute($db_arr);

        $response = [
            'success' => true,
            'message' => 'successfully added to the system.'
        ];
        
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }

    $_SESSION['response'] = $response;
    header('location: ../' . $_SESSION['redirect_to']);
    ob_end_flush();
    
?>