<?php
    session_start();
    if (!isset($_SESSION['user'])) header('location: login.php');
    $_SESSION['table'] = 'products';

    $products = include('db/show.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <title>Bekijk product</title>
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
                            <h1 class="section_header"><i class="fa fa-list"></i> Producten Lijst</h1>
                            <div class="section_content">
                                <div class="products">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Afbeelding</th>
                                            <th>Productnaam</th>
                                            <th>Voorraad</th>
                                            <th>LEVERANCIER URL</th>
                                            <th>Webwinkel URL</th>
                                            <th>Maat</th> <!-- New column for size -->
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($products as $index => $product) { ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td class="Foto">
                                                    <img class="productFoto" src="uploads/products/<?= $product['img'] ?>" alt=""/>
                                                </td>
                                                <td class="productNaam"><?= $product['product_naam'] ?></td>
                                                <td class="voorraad"><?= $product['voorraad'] ?></td>
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
                                                <td class="maat"><?= $product['maat'] ?></td> <!-- New column for size -->
                                                <td>
                                                    <a href="#" class="editProduct" data-pid="<?= $product['id']; ?>">
                                                        <i class="fa fa-pencil"></i> Bewerken
                                                    </a>
                                                    <a href="#" class="deleteProduct" data-pid="<?= $product['id']; ?>" data-name="<?= $product['product_naam']; ?>">
                                                        <i class="fa fa-trash"></i> Verwijderen
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <p class="userCount"><?= count($products) ?> Producten</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js">
    </script>
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
                    supplierUrl = targetElement.closest('tr').querySelector('td.supplierUrl').innerHTML;
                    webshopUrl = targetElement.closest('tr').querySelector('td.webshopUrl').innerHTML;
                    img = targetElement.closest('tr').querySelector('td.img').innerHTML;
                    maat = targetElement.closest('tr').querySelector('td.maat').innerHTML; // New variable for size
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
                                <label for="supplierUrl" class="labelSpacing">supplierUrl:</label>
                                <input type="text" class="form-control" id="supplierUrl" value="${supplierUrl}">
                            </div>
                            <div class="form-group">
                                <label for="webshopUrl" class="labelSpacing">webshopUrl:</label>
                                <input type="text" class="form-control" id="webshopUrl" value="${webshopUrl}">
                            </div>
                            <div class="form-group">
                                <label for="img" class="labelSpacing">img:</label>
                                <input type="text" class="form-control" id="img" value="${img}">
                            </div>
                            <div class="form-group">
                                <label for="maat" class="labelSpacing">Maat:</label> <!-- New field for size -->
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
                                    img: document.getElementById('img').value,
                                    supplierurl: document.getElementById('supplierUrl').value,
                                    webshopurl: document.getElementById('webshopurl').value,
                                    voorraad: document.getElementById('voorraad').value,
                                    maat: document.getElementById('maat').value // New value for size
                                    
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
