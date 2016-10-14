
<div class="sidebar-menu" style="min-height: 1016px;">
    <header class="logo-env">
        <!-- logo -->
        <div class="logo">
            <a href="#">
                <img src="<?php echo get_site_current_theme_url(); ?>/images/client-logo.png" alt="">
            </a>
        </div>
        <!-- logo collapse icon -->
        <div class="sidebar-collapse">
            <a href="https://192.168.0.102/index.php?menu=themes_system#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                <!--<i class="entypo-menu"></i>-->
                <div class="compass-bg"><img class="compass" src="<?php echo get_site_current_theme_url(); ?>/compass/needle.png" /></div>
            </a>
        </div>
        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="https://192.168.0.102/index.php?menu=themes_system#" class="with-animation"><!-- add class "with-animation" to support animation -->
                <!--<i class="entypo-menu"></i>-->
            </a>
        </div>
    </header>


    <ul id="main-menu" class="" style="">
        <li id="search" class="root-level">
            <form method="get" action="">
                <input type="text" id="search_module_elastix" name="search_module_elastix" class="search-input ui-autocomplete-input" placeholder="Search modules" autocomplete="off">
                <button type="submit">
                    <i class="fa fa-search" style="margin:3px 07px 0px 0px;"></i>
                </button>
            </form>
        </li>
        
        <?php sidenav($_SESSION['menu'], $_SESSION['sub_menu']); ?>
    </ul>
</div>