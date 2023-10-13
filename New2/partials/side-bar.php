<div class="dashboard_sidebar" id="dashboard_sidebar">
    <h4 class="dashboard_logo" id="dashboard_logo">SB</h4>
    <div class="dashboard_sidebar_user">
        <img src="images/none.jpg" alt="User_image" id="User_image"/>
        <span><?= $user['first_name']. ' ' . $user['last_name']  ?></span>
    </div>
    <div class="dashboard_sidebar_meuns">
        <ul class="dashbaord_menu_list">
        <!-- class="menuActive" -->
            <li class="liMainmenu">
                <a href="#"><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
            </li>
            <li class="liMainmenu">
                <a href="user_add.php"><i class="fa fa-user-plus"></i> <span class="menuText">add user</span></a>
            </li>
            <li class="liMainmenu showHideSubMenu" >
                <a href="javascript:void(0);" class="showHideSubMenu" >
                    <i class="fa fa-tag showHideSubMenu"></i> 
                    <span class="menuText showHideSubMenu">Product</span>
                    <i class="fa fa-angle-left mainMenuIconArrow showHideSubMenu"></i>
                </a>    
                <ul class="subMenus">
                    <li><a class="sublinks" href="#"><i class="fa fa-circle-o"></i>Add Product</a></li>
                    <li><a class="sublinks" href="#"><i class="fa fa-circle-o"></i>View Product</a></li>
                </ul>  
            </li>
        </ul>
    </div>
</div> 