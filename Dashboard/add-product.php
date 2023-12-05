<?php

    session_start();
    if (!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'products';
    $_SESSION['redirect_to'] = 'add-product.php';
    $user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <title>Producten Toevoegen</title>
</head>
<body>
<div id="dashboardMainContainer">
    <?php include('partials/side-bar.php') ?>
    <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/topNav.php') ?>
        <div class="dashboard_content">
            <div class="dashboard_content_main">
                <div class="row">
                    <div class="column column-12">
                        <h1 class="section_header"><i class="fa fa-plus"></i> Product Toevoegen</h1>
                        <div id="productAddFormContainer">
                            <form action="db/userdb.php" method="POST" class="appForm" enctype="multipart/form-data">
                                <div class="appformInputcontainer">
                                    <label for="product_naam">Productnaam</label>
                                    <input type="text" class="formInput" class="addFormspacing" id="product_naam"
                                           placeholder="Productnaam invoeren..." name="product_naam"/>
                                </div>

                                <div class="appformInputcontainer">
                                    <label for="voorraad">Voorraad</label>
                                    <input type="text" class="formInput" class="addFormspacing" id="voorraad"
                                           placeholder="Voorraad invoeren..." name="voorraad"/>
                                </div>

                                <div class="appformInputcontainer">
                                    <label for="maat">Maat</label>
                                    <!-- Change the name attribute to an array for multiple selections -->
                                    <select class="formInput" class="addFormspacing" id="maat" name="maat[]">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <!-- Add more size options as needed -->
                                    </select>
                                </div>

                                <div class="appformInputcontainer">
                                    <label for="supplier_url">Supplier URL:</label>
                                    <input type="text" name="supplier_url" id="supplier_url" placeholder="Supplier URL">
                                </div>

                                <div class="appformInputcontainer">
                                    <label for="webshop_url">Webshop URL:</label>
                                    <input type="text" name="webshop_url" id="webshop_url" placeholder="Webshop URL">
                                </div>

                                <div class="appformInputcontainer">
                                    <label for="product_img">Product afbeelding</label>
                                    <input type="file" class="addFormspacing" name="img"/>
                                </div>

                                <button type="submit" class="appbtn"><i class="fa fa-plus"></i> Toevoegen</button>
                            </form>
                            <?php
                            if (isset($_SESSION['response'])) {
                                $response_message = $_SESSION['response']['message'];
                                $is_success = $_SESSION['response']['success'];
                                ?>
                                <div class="responseMessage">
                                    <p class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                        <?= $response_message ?>
                                    </p>
                                </div>
                                <?php unset($_SESSION['response']);
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/script.js"></script>
<script src="js/jquery/jquery.3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js"
        integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

</body>
</html>
