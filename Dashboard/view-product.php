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
                                            <th>Maat</th>
                                            <th>Voorraad</th>
                                            <th>LEVERANCIER URL</th>
                                            <th>Webwinkel URL</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                          <?php foreach($products as $index => $product){ ?>   
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td class="Foto">
                                                    <img class="productFoto" src="uploads/products/<?= $product['img'] ?>" alt="" />
                                                </td>
                                                <td class="productNaam"><?= $product['product_naam'] ?></td>
                                                <td>
                                                    <select class="maatDropdown">
                                                        <?php foreach(explode(',', $product['maat']) as $maatOption) { ?>
                                                            <option value="<?= $maatOption ?>"><?= $maatOption ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td class="voorraad">Loading...</td>
                                                <td class="supplierUrl">
                                                    <a href="<?= $product['supplier_url'] ?>" target="_blank">
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                </td>
                                                <td class="webshopUrl">
                                                    <a href="<?= $product['webshop_url'] ?>" target="_blank">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" class="editProduct" data-pid="<?= $product['id'] ?>"><i class="fa fa-pencil"></i> Bewerken</a>
                                                    <a href="" class="deleteProduct" data-name="<?= $product['product_naam'] ?>" data-pid="<?= $product['id'] ?>"
                                                    data-pv="<?= $product['voorraad'] ?>" data-pm="<?= $product['maat'] ?>" data-psurl="<?= $product['supplier_url'] ?>"
                                                    data-pwurl="<?= $product['webshop_url'] ?>"><i class="fa fa-trash"></i> Verwijderen</a>
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
                Productnaam = targetElement.closest('tr').querySelector('td.productNaam').innerHTML;
                voorRaad = targetElement.closest('tr').querySelector('td.voorRaad').innerHTML;
                maat = targetElement.closest('tr').querySelector('td.maat').innerHTML;
                supplierUrl = targetElement.closest('tr').querySelector('td.supplierUrl').innerHTML;
                webshopUrl = targetElement.closest('tr').querySelector('td.webshopUrl').innerHTML;
                Swal.fire({
                    title: 'Update ' + Productname,
                    html: `
                        <div class="form-group">
                            <label for="Productnaam" class="labelSpacing">Productnaam:</label>
                            <input type="text" class="form-control" id="Productnaam" value="${Productnaam}">
                        </div>
                        <div class="form-group">
                            <label for="voorraad" class="labelSpacing">Voorraad:</label>
                            <input type="text" class="form-control" id="voorraad" value="${voorRaad}">
                        </div>
                        <div class="form-group">
                            <label for="maat" class="labelSpacing">maat:</label>
                            <input type="text" class="form-control" id="maat" value="${maat}">
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productRows = document.querySelectorAll('tr');

        productRows.forEach((row, index) => {
            if (index > 0) {
                const maatDropdown = row.querySelector('.maatDropdown');
                const voorraadCell = row.querySelector('.voorraad');

                maatDropdown.addEventListener('change', function () {
                    const selectedMaat = maatDropdown.value;

                    // Make an AJAX request to the modified file to fetch products based on "maat"
                    $.ajax({
                        method: 'POST',
                        data: { maat: selectedMaat },
                        url: 'db/show.php', // Use the correct URL to your modified PHP file
                        dataType: 'json',
                        success: function (data) {
                            // Update the product table with the fetched products
                            updateProductTable(data);
                        },
                        error: function () {
                            // Handle error if the AJAX request fails
                            voorraadCell.textContent = 'N/A';
                        }
                    });
                });
            }
        });

        // Function to update the product table
        function updateProductTable(products) {
            const productRows = document.querySelectorAll('tr');
    
            // Loop through the products
            products.forEach((product, index) => {
            const rowIndex = index + 1; // Rows are 1-indexed in your table
            const row = productRows[rowIndex];
            const voorraadCell = row.querySelector('.voorraad');

            // Update the "voorraad" cell with the new value
            voorraadCell.textContent = product.voorraad;
    });
    }
    });
</script>

</body>
</html>