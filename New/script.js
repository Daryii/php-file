// click function to check and change the styles when sideBar is open or closed.

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

// click function for changing the style in the dropdown menu when clicked on.

document.addEventListener('click', function(e){
    let clickedE1 = e.target;
    
    if (clickedE1.classList.contains('showHideSubMenu')) {
        let subMenu = clickedE1.closest('li').querySelector('.subMenus');
        let mainMenuitem = clickedE1.closest('li').querySelector('.mainMenuIconArrow');
        
    
      if(subMenu != null ){
        if(subMenu.style.display === 'block') {
          subMenu.style.display = 'none';
          mainMenuitem.classList.remove('fa-angle-down');
          mainMenuitem.classList.add('fa-angle-left');
          
        } else {
          subMenu.style.display = 'block';
          mainMenuitem.classList.remove('fa-angle-left');
          mainMenuitem.classList.add('fa-angle-down');
        } 
      } 
    } 
}); 