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
                <div class="dashboard_content_main">
                  <form action="" class="appForm">
                    <div>
                      <label for="first_name">First Name</label>
                      <input type="text" id="first_name" name="first_name" /> 
                    </div>
                    <div>
                      <label for="last_name">Last Name</label>
                      <input type="text" id="last_name" name="last_name" /> 
                    </div>
                    <div>
                      <label for="email">E-mail</label>
                      <input type="text" id="email" name="email" /> 
                    </div>
                    <div>
                      <label for="password">Password</label>
                      <input type="password" id="password" name="password" /> 
                    </div>
                    <button type="submit"><i class="fa fa-plus"></i>Add User</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
<script src="js/script.js">
 
</script>
</body>
</html>