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
      <div class="dashboard_sidebar" id="dashboard_sidebar">
        <h4 class="dashboard_logo" id="dashboard_logo">Img</h4>
        <div class="dashboard_sidebar_user">
          <img src="images/none.jpg" alt="User_image" id="User_image"/>
          <span>Daryi</span>
        </div>
        <div class="dashboard_sidebar_meuns">
          <ul class="dashbaord_menu_list">
            <li class="menuActive">
              <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
            </li>
            <li>
              <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="dashboard_content_container" id="dashboard_content_container">
        <div class="dashboard_topNav">
          <a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
        </div>
        <div class="dashboard_content">
          <div class="dashboard_content_main"></div>
        </div>
      </div>
    </div>
<script>
  
  let sideBarIsOpen = true;

  toggleBtn.addEventListener('click', (event) => {
    event.preventDefault();

    if (sideBarIsOpen) {
      dashboard_sidebar.style.width = '10%';
      dashboard_sidebar.style.transition = '0.3s all';
      dashboard_content_container.style.width = '90%';
      dashboard_logo.style.fontSize = '60px';
      User_image.style.width = '60px';
      
      menuText = document.getElementsByClassName('menuText');
      for (let i = 0; i < menuText.length;i++){
        menuText[i].style.display = 'none';
      }

      document.getElementsByClassName('dashbaord_menu_list')[0].style.textAlign = 'center';
      sideBarIsOpen = false;

    } else {
      dashboard_sidebar.style.width = '20%';
      dashboard_content_container.style.width = '80%';
      dashboard_logo.style.fontSize = '80px';
      User_image.style.width = '80px';
      
      menuText = document.getElementsByClassName('menuText');
      for (let i = 0; i < menuText.length;i++){
        menuText[i].style.display = 'inline-block';
      }

      document.getElementsByClassName('dashbaord_menu_list')[0].style.textAlign = 'left';
      sideBarIsOpen = true;
    }
  });

</script>
</body>
</html>