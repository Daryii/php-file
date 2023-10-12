<?php 
  $servername = 'mariadb';
  $username = 'root';
  $password = 'mysql';  
  $db = 'inventory';

 
  // Conneting to database.
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", "$username", "$password");
    //code...
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch (\Exception $e) {
      $error_message = $e->getMessage();
  }

?> 

