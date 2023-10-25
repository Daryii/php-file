<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'products';
  
  $products = include('db/show.php');
  
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
  <title>View Product - Inventory Management System</title>
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
                            <h1 class="section_header"><i class="fa fa-list"></i> Products List</h1>
                            <div class="section_content">
                              <div class="users">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Created By</th>
                                            <th>Created At</th>
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
                                                <td class="Description"><?= $product['description'] ?></td>
                                                <td class="created_by"><?= $product['created_by'] ?></td>
                                                <td><?= date('M d,Y @ h:i:s A' , strtotime($product['created_at'])) ?></td>
                                                <td><?= date('M d,Y @ h:i:s A' , strtotime($product['updated_at'])) ?></td>
                                                <td>
                                                    <a href="" class="editProduct" data-pid="<?= $product['id'] ?>" ><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="" class="deleteProduct" data-name="<?= $product['product_name'] ?>" data-pid="<?= $product['id'] ?>"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                          <?php }?>
                                      </tbody>
                                </table>
                                <p class="userCount"><?=count($products)?> Products</p>
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

            if (classList.contains("deleteProduct")) {
                e.preventDefault();

                pId = targetElement.dataset.pid;
                pName = targetElement.dataset.name;

                Swal.fire({
                    title: "Delete Product?",
                    text: `Are you sure to delete ${pName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it",
                    cancelButtonText: "No, cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, proceed with deletion
                        $.ajax({
                            method: "POST",
                            data: {
                                id: pId,
                            },
                            url: "db/delete-product.php",
                            dataType: "json",
                            success: function (data) {
                                if (data.success) {
                                    Swal.fire("Success", data.message, "success").then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire("Error", data.message, "error");
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
                Productname = targetElement.closest('tr').querySelector('.productName');
                Description = targetElement.closest('tr').querySelector('.Description');
                Created_by = targetElement.closest('tr').querySelector('.created_by');
                Img = targetElement.closest('tr').querySelector('.Image');

                Swal.fire({
                    title: 'Update ' + Productname,
                    html: `
                        <div class="form-group">
                            <label for="Productname">Product Name:</label>
                            <input type="text" class="form-control" id="Productname" value="${Productname}">
                        </div>
                        <div class="form-group">
                            <label for="Description">Description:</label>
                            <input type="text" class="form-control" id="Description" value="${Description}">
                        </div>
                        <div class="form-group">
                            <label for="Created_by">Created by:</label>
                            <input type="url" class="form-control" id="created_by" value="${Created_by}">
                        </div>
                        <div class="form-group">
                            <label for="Img">Img:</label>
                            <input type="file" class="form-control" id="img" value="${Img}">
                        </div>
                    `,
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, proceed with update
                        $.ajax({
                            method: 'POST',
                            data: {
                                User_id: userId,
                                p_name: document.getElementById('Productname').value,
                                Description: document.getElementById('Description').value,
                                created_by: document.getElementById('created_by').value,
                                Image: document.getElementById('img').value,
                            },
                            url: 'db/update-product.php',
                            dataType: 'json',
                            success: function (data) {
                                if (data.success) {
                                    Swal.fire('Success', data.message, 'success').then(() => {
                                        // You can add any additional actions after a successful update here
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