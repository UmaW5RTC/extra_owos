<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Edit postal code</strong></li>
</ol>

<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ipo_poid">Post Office Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" value="<?php echo $sel_po->ipo_poid; ?>" placeholder="Post Office Code" name="ipo_poid" readonly>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Post Office Code</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ipo_poname">Post Office Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" value="<?php echo $sel_po->ipo_poname; ?>" placeholder="Post Office Name" name="ipo_poname">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Post Office Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ipo_pincode">Post Office Pincode
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Post Office Pincode" value="<?php echo $sel_po->ipo_pincode; ?>" name="ipo_pincode">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Post Office Pincode</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ipo_location">Post Office Location
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Post Office Location" value="<?php echo $sel_po->ipo_location; ?>" name="ipo_location">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Post Office Location</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ipo_potype">Post Office Type
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <p>
                                                        B.O:
                                                        <input type="radio" class="flat" name="ipo_potype" value="B.O" required 
                                                        <?php if ($sel_po->ipo_potype == "B.O") {echo "checked";}?> /> 
                                                        H.O:
                                                        <input type="radio" class="flat" name="ipo_potype" value="H.O" required 
                                                        <?php if ($sel_po->ipo_potype == "H.O") {echo "checked";}?> />
                                                        S.O:
                                                        <input type="radio" class="flat" name="ipo_potype" value="S.O" required 
                                                        <?php if ($sel_po->ipo_potype == "S.O") {echo "checked";}?> />
                                                    </p>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Post Office Type</span>
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