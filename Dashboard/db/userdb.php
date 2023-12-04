<?php
session_start();
ob_start();

// Capture the table mapping
include('table-columns.php');

// Capture the table name.
$table_name = $_SESSION['table'];
$columns = $table_columns_mapping[$table_name];

// Loop through the columns
$db_arr = [];

foreach ($columns as $column) {
    // Remove any extra spaces from the column name
    $column = trim($column);

    if ($column == 'password') {
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
        if ($check) {
            if (move_uploaded_file($file_data['tmp_name'], $target_dir . $file_name)) {
                // Save the file_name to the db.
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

// Insert product into the product table
try {
    $sql = "INSERT INTO $table_name (`id`, " . implode(", ", array_keys($db_arr)) . ") VALUES (NULL, " . rtrim(str_repeat("?, ", count($db_arr)), ", ") . ")";
    
    include('connection.php');
    
    $stmt = $conn->prepare($sql);
    $stmt->execute(array_values($db_arr));

    $product_id = $conn->lastInsertId(); // Get the id of the inserted product

    // Insert sizes into the size table
    foreach ($_POST['maat'] as $selected_size) {
        $insert_size_query = "INSERT INTO sizes (`size`, `product_id`, `created_at`) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($insert_size_query);
        $stmt->execute([$selected_size, $product_id]);
    }

    $response = [
        'success' => true,
        'message' => 'Successfully added to the system.'
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
