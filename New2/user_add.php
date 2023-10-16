<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'users';
  $user = $_SESSION['user']; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">        
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
  <title>Dashboard - Inventory Management System</title>
  
</head>
<body>

  <div id="dashboardMainContainer">
    <?php include('partials/side-bar.php')?> 
    <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/topNav.php')?> 
        <div class="dashboard_content">
            <div class="row">
              <div class="column">
                <div class="dashboard_content_main">
                  <div id="userAddFormContainer">
                    <form action="db/userdb.php" method="POST" class="appForm">
                        <div class="appformInputcontainer">
                          <label for="first_name">First Name</label>
                          <input type="text"class="formInput" id="first_name" name="first_name" /> 
                        </div>
                        <div class="appformInputcontainer">
                          <label for="last_name">Last Name</label>
                          <input type="text" class="formInput" id="last_name" name="last_name" /> 
                        </div>
                        <div class="appformInputcontainer">
                          <label for="email">E-mail</label>
                          <input type="text" class="formInput" id="email" name="email" /> 
                        </div>
                        <div class="appformInputcontainer">
                          <label for="password">Password</label>
                          <input type="password" class="formInput" id="password" name="password" /> 
                        </div>
                        <button type="submit" class="appbtn"><i class="fa fa-plus"></i>Add User</button>
                    </form>
                    <?php 
                          if(isset($_SESSION['response'])){ 
                            $response_message = $_SESSION['response']['message'];
                            $is_success = $_SESSION['response']['success'];
                    ?>
                          <div class="responseMessage">
                              <p class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                <?= $response_message ?>
                              </p>
                          </div>
                    <?php unset($_SESSION['response']); } ?>
                </div>
          </div>
        </div>
        <div class="column">s</div>
      </div>
      </div>
    </div>
  </div>

<script src="js/script.js"></script>
</body>
</html>