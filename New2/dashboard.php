<?php

  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');

  $user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">        
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
  <title>Dashboard - Inventory Management System</title>
  
</head>
<body>
    <div id="dashboardMainContainer">
        <?php include('partials/side-bar.php')?> 
        <div class="dashboard_content_container" id="dashboard_content_container">
          <?php include('partials/topNav.php')?> 
      
            <div class="dashboard_content">
                <div class="dashboard_content_main"></div>
            </div>
        </div>
    </div>
<script src="js/script.js">
 
</script>
</body>
</html>