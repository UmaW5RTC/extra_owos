<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Edit Module Tab</strong></li>
</ol>

<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulegroupcode">Module Group Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Group Code" name="imo_modulegroupcode" value="<?php echo $sel_module->imo_modulegroupcode; ?>" onkeydown="upperCaseF(this)" readonly>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Group Code</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulecode">Module Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Code" name="imo_modulecode" value="<?php echo $sel_module->imo_modulecode; ?>" onkeydown="upperCaseF(this)" readonly>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Code</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_moduleiconname">Module Icon Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Icon Name" name="imo_moduleiconname" value="<?php echo $sel_module->imo_moduleiconname; ?>" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Icon Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulepagename">Module Page Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Page Name" name="imo_modulepagename" value="<?php echo $sel_module->imo_modulepagename; ?>" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Page Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulename">Module Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Name" name="imo_modulename" value="<?php echo $sel_module->imo_modulename; ?>" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulename_hi">Module Name Hindi
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Name Hindi" name="imo_modulename_hi" value="<?php echo $sel_module->imo_modulename_hi; ?>" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Name Hindi</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulename_or">Module Name Odiya
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Name Odiya" name="imo_modulename_or" value="<?php echo $sel_module->imo_modulename_or; ?>" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Name Odiya</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_moduleorder">Module Order
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Order" name="imo_moduleorder" value="<?php echo $sel_module->imo_moduleorder; ?>" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Order</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_moduleorder">Status
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <p>
                                                        Active :
                                                        <input type="radio" class="flat" name="imo_modulestatus" value="Active " required 
                                                        <?php if ($sel_module->imo_modulestatus == "Active") {echo "checked";}?> /> 
                                                        Inactive :
                                                        <input type="radio" class="flat" name="imo_modulestatus" value="Inactive" required 
                                                        <?php if ($sel_module->imo_modulestatus == "Inactive") {echo "checked";}?> />
                                                    </p>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Status</span>
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