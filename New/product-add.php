<!-- <?php
    
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <?php include('partials/header.php') ?>
</head>
<body>
    <div id="dashboardMainContainer">
    <?php include('partials/sidebar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/topNav.php') ?>
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row">
                        <div class="column column-12">
                            <h1 class="section_header"><i class="fa fa-plus"></i> Create Product</h1>
                        </div>
                        <div id="ProductAddFormContainer">
                            <form action="database/connetion.php">
                                <div class="ProductFormInputContainer">
                                    <label for="name">Product Name</label>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('partials/app-script.js') ?>
</body>
</html>