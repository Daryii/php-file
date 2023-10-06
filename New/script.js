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
