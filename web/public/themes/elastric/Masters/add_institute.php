<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Add Institute</strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                 <!--Institute Code-->
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iit_institutecode">Institute Code<span class="text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="iit_institutecode" name="iit_institutecode" placeholder="Institute Code" class="date-picker form-control" required="required" type="text" onkeydown="upperCaseF(this)">
                    </div>
                </div>

                <!-- Institute Name-->
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="iit_institutename">Institute Name<span class="text-danger">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="iit_institutename" id="iit_institutename" required="required" placeholder="Institute Name" class="form-control col-md-7 col-xs-12" data-parsley-minlength="3">
                    </div>
                </div>

                  
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <input id="send" type="reset" class="btn btn-primary" value="Reset">
                        <input id="send" type="submit" name="submit" class="btn btn-success" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/foot.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/app_bottom.php");?>