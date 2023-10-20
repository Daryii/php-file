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
    foreach($columns as $column){
        if(in_array($column, ['created_at', 'updated_at'])) $value = date('Y-m-d H:i:s');
        else if ($column == 'created_by') $value = $user['id'];
        else $value = isset($_POST[$column]) ? $_POST[$column] : '';

        $db_arr[$column] = $value;
    }
    
    $table_properties = implode(", ",  array_keys($db_arr));
    $table_placeholders = ':' . implode(", :", array_keys($db_arr));
         
     

    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    // $encrypted = password_hash($password, PASSWORD_DEFAULT);


    try {
        $sql = "INSERT INTO 
                $table_name($table_properties)
                            VALUES
                                 ($table_placeholders)";
    
    
    
        include('connection.php');
        $stmt = $conn->prepare($sql);
        $stmt->execute($db_arr);


        $response = [
            'success' => true,
            'message' => $first_name . ' ' . $last_name . ' successfully added to the system.'
        ];
        
    } catch (PDOException $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }

    $_SESSION['response'] = $response;
    header('location: ../user_add.php');
    ob_end_flush();
    
?>