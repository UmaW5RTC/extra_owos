
<div class="main-content" style="min-height: 1016px;">
<div style="height:92px;background-color:#efefef;padding:15px;">
    <!-- Profile Info and Notifications -->
    <div class="client-title"><img src="<?php echo get_site_current_theme_url(); ?>/images/client-title1.png" /></div>
    <span style="float:right; text-align:right; padding:0px 5px 0px 0px; width:175px;" class="col-md-6 col-sm-8 clearfix">
        <ul style="float:right;" class="user-info pull-none-xsm">
            <!-- Profile Info -->
            <li class="profile-info dropdown pull-right"><!-- add class "pull-right" if you want to place this from right -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

            <img style="border:0px" src="<?php echo get_site_current_theme_url(); ?>/images/Icon-user.png" alt="" class="img-circle" width="34">
                    <?php echo $_SESSION['user_name']; ?>
                </a>
                <!-- Reverse Caret -->
                <i style="font-size:15px;font-weight:bold;" class="fa fa-angle-down"></i>
                <!-- Profile sub-links -->
                <ul class="dropdown-menu">

                    <!-- Reverse Caret -->
                    <li class="caret"></li>

                    <!-- Profile sub-links -->
                    <li class="dropdown">
                        <a href="<?php echo BASE; ?>/change_password" class="setadminpassword">
                            <i class="fa fa-user"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo BASE;?>/logout");">
                            <i class="fa fa-sign-out"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </span>

    <!-- Raw Links -->
    <span style="float:right;">
        <ul style="padding-top:12px;" class="list-inline links-list pull-right neo-topbar-notification">

        <li style="margin-top:10px" id="header_notification_bar" class="profile-info dropdown">
            <a data-toggle="dropdown" class="" href="#">
               <!-- <i class="fa fa-asterisk"></i>--><img class="disha-info" src="<?php echo get_site_current_theme_url(); ?>/images/star.png" />
            </a>
            <ul class="dropdown-menu">

                <!-- Reverse Caret -->
                <li class="caret"></li>

                <!-- Profile sub-links -->
                <li><a href="#" class="register_link" style="color: rgb(255, 0, 0);">Register</a></li>
                <li><a href="#" id="viewDetailsRPMs"><i class="fa fa-cube"></i>Disha Version</a></li>
                <li><a href="#" target="_blank"><i class="fa fa-external-link"></i>Disha Website</a></li>
                <li><a href="#" id="dialogaboutelastix"><i class="fa fa-info-circle"></i>About Disha</a></li>
            </ul>
        </li>

        <!--li id="header_notification_bar" class="dropdown">
            <a  class="" href="index.php?menu=addons">
                <i class="fa fa-cubes"></i>
            </a>
        </li-->

        <!-- notification dropdown start-->
        <!--li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="" href="#">
                <i class="fa fa-heartbeat"></i>
            </a>
        </li>
        <!-- notification dropdown end -->
        <!--<li id="header_notification_bar" class="profile-info dropdown pull-right notifications" style="float: none !important;">
            <a data-toggle="dropdown" class="" href="https://192.168.0.102/index.php?menu=themes_system#">
                <i class="fa fa-bell-o"></i></a>
            <ul class="dropdown-menu">
				<li class="caret"></li>
				<li><p>System</p></li>
                <li>
                    <ul>
                    <li><p>No notifications</p></li>
                    </ul>
                </li>
                <li><p>User</p></li>
                <li>
                    <ul>
                    <li><p>No notifications</p></li>
                    </ul>
                </li>
            	</ul>
        		</li>-->
        </ul>
    </span>

</div>