<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
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
    <script src="script.js"></script>
</body>
</html>