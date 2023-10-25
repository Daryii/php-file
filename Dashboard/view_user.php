<?php
  session_start();
  if(!isset($_SESSION['user'])) header('location: login.php');
  $_SESSION['table'] = 'users';
  $user = $_SESSION['user']; 

  $_SESSION['table'] = 'users';
  $users = include('db/show.php');
  
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
                        
                        <div class="column column-12">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
<script>
document.addEventListener('click', function (e) {
  targetElement = e.target;
  classList = targetElement.classList;

  if (classList.contains('deleteUser')) {
      e.preventDefault();
      userId = targetElement.dataset.userid;
      fname = targetElement.dataset.fname;
      lname = targetElement.dataset.lname;
      fullname = fname + ' ' + lname;

      // Delete user logic (place your delete code here)
      Swal.fire({
          title: 'Delete User?',
          text: `Are you sure you want to delete ${fullname}?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it',
          cancelButtonText: 'No, cancel',
      }).then((result) => {
          if (result.isConfirmed) {
              // User confirmed, proceed with delete
              $.ajax({
                  method: 'POST',
                  data: {
                    user_id: userId,
                    f_name: fname,
                    l_name: lname 
                  },
                  url: 'db/delete-user.php', // Replace with the actual delete URL
                  dataType: 'json',
                  success: function (data) {
                      if (data.success) {
                          Swal.fire('Success', data.message, 'success').then(() => {
                              // You can add any additional actions after a successful delete here
                          });
                      } else {
                          Swal.fire('Error', data.message, 'error');
                      }
                  },
              });
          }
    });
  }
  if (classList.contains('editUser')) {
      e.preventDefault();

      // Getting data
      firstName = targetElement.closest('tr').querySelector('td.firstName').innerHTML;
      lastName = targetElement.closest('tr').querySelector('td.lastName').innerHTML;
      email = targetElement.closest('tr').querySelector('td.email').innerHTML;
      userId = targetElement.dataset.userid;

      Swal.fire({
          title: 'Update ' + firstName + ' ' + lastName,
          html: `
              <div class="form-group">
                  <label for="firstName">First Name:</label>
                  <input type="text" class="form-control" id="firstName" value="${firstName}">
              </div>
              <div class="form-group">
                  <label for="lastName">Last Name:</label>
                  <input type="text" class="form-control" id="lastName" value="${lastName}">
              </div>
              <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="emailUpdated" value="${email}">
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
                      user_id: userId,
                      f_name: document.getElementById('firstName').value,
                      l_name: document.getElementById('lastName').value,
                      email: document.getElementById('emailUpdated').value,
                  },
                  url: 'db/update-user.php',
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
</script>

</body>
</html>







