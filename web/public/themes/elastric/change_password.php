<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li class="active"><strong>Change Password</strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>

                 <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="iap_applicationcode">Old Password
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                         <input class="form-control" id="old" placeholder="Old Password" name="old" type="password" required>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Old Password</span>
                    </div>
                </div>

               <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="iap_applicationcode">New Password
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input class="form-control" id="new_pass" placeholder="New Password" name="new" type="password" required>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">New Password</span>
                    </div>
                </div>

                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="iap_applicationname">Confirm Password
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                         <input class="form-control" id="confirm" name="confirm" placeholder="Confirm Password" type="password" required data-parsley-equalto="#new_pass">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Confirm Password</span>
                    </div>
                </div>
                  
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                         <input id="send" type="reset" class="btn btn-primary" value="Reset">
                         <input class="btn btn-success" type="submit" value="Change" name="update">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="clearfix"></div>

<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/foot.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/app_bottom.php");?>