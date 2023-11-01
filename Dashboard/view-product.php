<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'products';
  
  $products = include('db/show.php');
  
  // Retrieve the "size_and_stock" value from the form
  $sizeAndStockJSON = isset($_POST['size_and_stock']) ? $_POST['size_and_stock'] : '';

  // Ensure it's valid JSON data
    $sizeAndStockArray = json_decode($sizeAndStockJSON, true);

    if ($sizeAndStockArray === null) {
        // Handle invalid JSON data
        $sizeAndStockArray = []; // or any other suitable default value
    }

// Insert the JSON data into your database
    $sizeAndStockJSON = json_encode($sizeAndStockArray);
  
  // Rest of your code to insert data into the database
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">        
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
  <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
  <title>Bekijk product</title>
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
                            <h1 class="section_header"><i class="fa fa-list"></i> Producten Lijst</h1>
                            <div class="section_content">
                              <div class="products">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Afbeelding</th>
                                            <th>Productnaam</th>
                                            <th>Sizes and Stock</th>
                                            <th>Supplier URL</th>
                                            <th>Webshop URL</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                          <?php foreach($products as $index => $product){ ?>   
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td class="Image"> 
                                                  <img class="productImages" src="uploads/products/<?= $product['img'] ?>" alt=""/>
                                                </td>
                                                <td class="productName"><?= $product['product_name'] ?></td>                                  
                                                <td>
                                                    <?php
                                                    $sizeAndStock = json_decode($product['sizes_and_stock'], true);
                                                    if ($sizeAndStock !== null) {
                                                        // Iterate through the size and stock data and display it
                                                        foreach ($sizeAndStock as $size => $stock) {
                                                            echo "$size: $stock<br>";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?= $product['supplier_url'] ?>" target="_blank">
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= $product['webshop_url'] ?>" target="_blank">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </td>
                                                <td><?= date('M d,Y @ h:i:s A' , strtotime($product['updated_at'])) ?></td>
                                                <td>
                                                    <a href="" class="editProduct" data-pid="<?= $product['id'] ?>" ><i class="fa fa-pencil"></i> Bewerken</a>
                                                    <a href="" class="deleteProduct" data-name="<?= $product['product_name'] ?>" data-pid="<?= $product['id'] ?>"><i class="fa fa-trash"></i> Verwijderen</a>
                                                </td>
                                            </tr>
                                          <?php }?>
                                      </tbody>
                                </table>
                                <p class="userCount"><?=count($products)?> Producten</p>
                              </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
  
    this.registerEvents = function () {
        document.addEventListener("click", function (e) {
            targetElement = e.target;
            classList = targetElement.classList;

            if (classList.contains('deleteProduct')) {
                e.preventDefault();

                userId = targetElement.dataset.pid;
                pName = targetElement.dataset.name;
                
                // Delete user logic (place your delete code here)
                Swal.fire({
                    title: 'Gebruiker verwijderen?',
                    text: `Weet je zeker dat je ${pName} wilt verwijderen?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ja, verwijderen',
                    cancelButtonText: 'Nee, annuleren',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, proceed with delete
                        $.ajax({
                            method: 'POST',
                            data: {
                                user_id: userId,
                                p_name: pName
                            },
                            url: 'db/delete_product.php', // Replace with the actual delete URL
                            dataType: 'json',
                            success: function (data) {
                                if (data.success) {
                                    Swal.fire('Success', data.message, 'success').then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', data.message, 'error');
                                }
                            },
                        });
                    }
                });
            }
            if (classList.contains("editProduct")) {
                e.preventDefault();

                // Getting data
                userId = targetElement.dataset.pid;
                Productname = targetElement.closest('tr').querySelector('td.productName').innerHTML;
                Stock = targetElement.closest('tr').querySelector('td.stock').innerHTML;
                Description = targetElement.closest('tr').querySelector('td.description').innerHTML;
                Created_by = targetElement.closest('tr').querySelector('td.created_by').innerHTML;

                Swal.fire({
                    title: 'Update ' + Productname,
                    html: `
                        <div class="form-group">
                            <label for="Productname" class="labelSpacing">Productnaam:</label>
                            <input type="text" class="form-control" id="Productname" value="${Productname}">
                        </div>
                        <div class="form-group">
                            <label for="Description" class="labelSpacing">Beschrijving:</label>
                            <input type="text" class="form-control" id="Description" value="${Description}">
                        </div>
                        <div class="form-group">
                            <label for="stock" class="labelSpacing">Voorraad:</label>
                            <input type="text" class="form-control" id="stock" value="${Stock}">
                        </div>
                        <div class="form-group">
                            <label for="created_by" class="labelSpacing">Gemaakt door:</label>
                            <input type="text" class="form-control" id="created_by" value="${Created_by}">
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    cancelButtonText: 'Annuleren',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, proceed with update
                        $.ajax({
                            method: 'POST',
                            data: {
                                User_id: userId,
                                p_name: document.getElementById('Productname').value,
                                Description: document.getElementById('Description').value,
                                stock_p: document.getElementById('stock').value,
                                created_by: document.getElementById('created_by').value,
                            },
                            url: 'db/update-product.php',
                            dataType: 'json',
                            success: function (data) {
                                if (data.success) {
                                    Swal.fire('Success', data.message, 'success').then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire('Error', data.message, 'error');
                                }
                            },
                        });
                    }
                });
            }
        });
    }

    // Call the registerEvents function to set up event listeners
    registerEvents();
</script>

</body>
</html>