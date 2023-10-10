<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">        
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <?php include('partials/header.php') ?>
</head>
<body>
  <div id="dashboardMainContainer">
      <!-- Sidebar -->
      <?php include('partials/sidebar.php') ?>
      <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('partials/topNav.php') ?>
        <div class="dashboard_content">
          <div class="dashboard_content_main"></div>
        </div>
      </div>
    </div>
    <!-- js-script -->
  <?php include('partials/app-script.js') ?>
</body>
</html>