<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Edit institute</strong></li>
</ol>

<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="iit_institutecode"><?php echo LABEL_INSTITUTE_CODE?>
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Institute Code" name="iit_institutecode" value="<?php echo $sel_institute->iit_institutecode; ?>" readonly>
                        <div class="form-control-focus"> </div>
                        <span class="help-block"><?php echo LABEL_INSTITUTE_CODE?></span>
                    </div>
                </div>

                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="iit_institutename"><?php echo LABEL_INSTITUTE_NAME?>
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Institute Name" name="iit_institutename" value="<?php echo $sel_institute->iit_institutename; ?>">
                        <div class="form-control-focus"> </div>
                        <span class="help-block"><?php echo LABEL_INSTITUTE_NAME?></span>
                    </div>
                </div>
                                        
                  
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
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