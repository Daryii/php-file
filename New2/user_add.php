<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'users';
  $user = $_SESSION['user']; 
  $users = include('db/show-users.php');
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">        
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
  <title>Dashboard - Inventory Management System</title>
  
</head>
<body>

    <div id="dashboardMainContainer">
        <?php include('partials/side-bar.php') ?>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('partials/topNav.php')?> 
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="row">
                        <div class="column column-5">
                            <h1 class="section_header"><i class="fa fa-plus"></i>Create User</h1>
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
                        <div class="column column-7">
                            <h1 class="section_header"><i class="fa fa-list"></i> User List</h1>
                            <div class="section_content">
                              <div class="users">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First_name</th>
                                            <th>Last_name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                          <?php foreach($users as $index => $user){ ?>   
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td class="firstName"><?= $user['first_name'] ?></td>
                                                <td class="lastName"><?= $user['last_name'] ?></td>
                                                <td class="email"><?= $user['email'] ?></td>
                                                <td><?= date('M d,Y @ h:i:s A' , strtotime($user['created_at'])) ?></td>
                                                <td><?= date('M d,Y @ h:i:s A' , strtotime($user['updated_at'])) ?></td>
                                                <td>
                                                  <a href="" class="editUser" data-userid="<?= $user['id']?>" ><i class="fa fa-pencil"></i>Edit</a>
                                                  <a href="" class="deleteUser" data-userid="<?= $user['id']?>" data-fname="<?= $user['first_name']?>" data-lname="<?= $user['last_name']?>"  ><i class="fa fa-trash"></i>Delete</a>
                                                </td>
                                            </tr>
                                          <?php }?>
                                      </tbody>
                                </table>
                                <p class="userCount"><?=count($users)?>Users</p>
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

            if(classList.contains('deleteUser')){
              e.preventDefault();
              userId = targetElement.dataset.userid;
              fname = targetElement.dataset.fname;
              lname = targetElement.dataset.lname;
              fullname = fname + ' ' + lname;

              if(window.confirm('Are you sure to delete '+ fullname +'?')){
                $.ajax({
                  method: 'POST',
                  data: {
                    user_id: userId,
                    f_name: fname,
                    l_name: lname  
                  },
                  url: 'db/delete-user.php',
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
            if(classList.contains('editUser')){
              e.preventDefault(); // Prevent loading.;

              // getting data
              
              firstName = targetElement.closest('tr').querySelector('td.firstName').innerHTML;
              lastName = targetElement.closest('tr').querySelector('td.lastName').innerHTML;
              email = targetElement.closest('tr').querySelector('td.email').innerHTML;
              userId = targetElement.dataset.userid;


              bootbox.confirm({
                title: 'Update ' + firstName + ' ' + lastName,
                message: '<form>\
                  <div class="form-group">\
                      <label for="firstName">First Name:<label>\
                      <input type="text" class="form-control" id="firstName" value="'+ firstName +'">\
                    </div>\
                    <div class="form-group">\
                      <label for="lastName">last Name:<label>\
                      <input type="text" class="form-control" id="lastName" value="'+ lastName +'">\
                    </div>\
                  <div class="form-group">\
                      <label for="email">Email address:<label>\
                      <input type="email" class="form-control" id="emailUpdated" value="'+ email +'">\
                    </div>\
                </form>',
                
                callback: function (isUpdate) {
                  if(isUpdate){
                    $.ajax({
                      method: 'POST',
                      data: {
                        user_id: userId,
                        f_name: document.getElementById('firstName').value,
                        l_name: document.getElementById('lastName').value,
                        email: document.getElementById('emailUpdated').value,
                      },
                      url: 'db/update-user.php',
                      dataType: 'json',
                      success: function(data){
                        if(data.success){   
                            bootbox.alert({
                              type: bootbox.TYPE_SUCCESS,
                              message: data.message,
                              callback: function(){
                                location.reload();
                              }
                            });
                        } else 
                            bootbox.alert({
                              type: bootbox.TYPE_DANGER,
                              message: data.message,
                            });
                      }
                })
                  } 
                }



              });
           
            }
          });
      }
    }

    var script = new script;
    script.initialize();
    
</script>
</body>
</html>