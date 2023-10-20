<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  
  $_SESSION['table'] = 'products';
  $user = $_SESSION['user']; 
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">        
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
  <title>Add Product - Inventory Management System</title>  
</head>
<body>

    <div id="dashboardMainContainer">
        <?php include('partials/side-bar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/topNav.php')?> 
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row">
                        <div class="column column-12">
                            <h1 class="section_header"><i class="fa fa-plus"></i>Create Product</h1>
                            <div id="userAddFormContainer">
                                <form action="db/userdb.php" method="POST" class="appForm">

                                  <div class="appformInputcontainer">
                                    <label for="product_name">Product Name</label>
                                    <input type="text"class="formInput" id="product_name" placeholder="Enter product name..." name="product_name" /> 
                                  </div>

                                  <div class="appformInputcontainer">
                                    <label for="description">Description</label>
                                    <textarea class="formInput productTextArea" id="description" placeholder="Enter product description..." name="description"></textarea>
                                  </div>
 
                                  <button type="submit" class="appbtn"><i class="fa fa-plus"></i>Add Product</button>
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
                </div>
            </div>
        </div>
    </div>

<script src="js/script.js"></script>
<script src="js/jquery/jquery.3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>