<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Add Constant value</strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="icv_constantvalcode"><?php echo CONSTANT_VALUE_CODE?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Constant Value Code" name="icv_constantvalcode">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"><?php echo CONSTANT_VALUE_CODE?></span>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="icv_constantvalname"><?php echo CONSTANT_VALUE_NAME?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Constant Value Name" name="icv_constantvalname" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"><?php echo CONSTANT_VALUE_NAME?></span>
                                                </div>                                              
                                            </div>                                          
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="icv_constantcode"><?php echo CONSTANT_CODE?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="icv_constantcode" id="icv_constantcode" class="select2_group form-control" required >
                                                        <option value="" selected="selected">-- Select --</option>
                                                        <?php 
                                                            $constant_set = IM_Mr_Constantcode::find_all();
                                                           foreach($constant_set as $constant){
                                                             echo '<option value="' . $constant->ict_constantcode . '">' . $constant->ict_constantname . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"><?php echo CONSTANT_CODE?></span>
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