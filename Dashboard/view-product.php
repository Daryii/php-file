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
                                                <td class="lastName"><?= $product['product_name'] ?></td>
                                                <td class="email"><?= $product['description'] ?></td>
                                                <td><?= $product['created_by'] ?></td>
                                                <td><?= date('M d,Y @ h:i:s A' , strtotime($product['created_at'])) ?></td>
                                                <td><?= date('M d,Y @ h:i:s A' , strtotime($product['updated_at'])) ?></td>
                                                <td>
                                                  <a href="" class="editProduct" data-pid="<?= $user['id'] ?>" ><i class="fa fa-pencil"></i>Edit</a>
                                                  <a href="" class="deleteProduct" data-name="<?= $product['product_name']?>" data-description="<?= $product['description']?>" data-pid="<?= $user['id'] ?>" ><i class="fa fa-trash"></i>Delete</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/6.0.0/bootbox.min.js" integrity="sha512-oVbWSv2O4y1UzvExJMHaHcaib4wsBMS5tEP3/YkMP6GmkwRJAa79Jwsv+Y/w7w2Vb/98/Xhvck10LyJweB8Jsw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function script(){
    
    this.initialize = function(){
        this.registerEvents();
    },

    this.registerEvents = function(){
        document.addEventListener('click', function(e){
          targetElement = e.target;
          classList = targetElement.classList;

          if(classList.contains('deleteProduct')){
            e.preventDefault();
            
            pid = targetElement.dataset.pid;
            pName = targetElement.dataset.pName;

            if(window.confirm('Are you sure to delete '+ pName +'?')){
              $.ajax({
                method: 'POST',
                data: {
                  id: pid,
                  name: pName 
                },
                url: 'db/delete-product.php',
                dataType: 'json',
                success: function(data){
                  if(data.success){
                      if(window.confirm(data.message)){
                        location.reload();
                      }
                  } else window.alert(data.message);
                }
              })
            }
              
          }
        });
    }
  }

  var script = new script;
  script.initialize();

</script>
</body>
</html>