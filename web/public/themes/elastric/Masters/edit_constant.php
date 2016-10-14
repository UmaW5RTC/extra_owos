<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Edit Contant</strong></li>
</ol>

<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ict_constantcode"><?php echo CONSTANT_CODE?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Constant Code" value="<?php echo $sel_constantcode->ict_constantcode; ?>" name="ict_constantcode" readonly>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"><?php echo CONSTANT_CODE?></span>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ict_constantname"><?php echo CONSTANT_NAME?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Constant Name" value="<?php echo $sel_constantcode->ict_constantname; ?>" name="ict_constantname" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"><?php echo CONSTANT_NAME?></span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ict_constantcodeprefix"><?php echo CONSTANT_CODE_PREFIX ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Constant Code Prefix" value="<?php echo $sel_constantcode->ict_constantcodeprefix; ?>" name="ict_constantcodeprefix" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"><?php echo CONSTANT_CODE_PREFIX ?></span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="ict_institutecode"><?php echo LABEL_INSTITUTE_NAME ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="ict_institutecode" id="ict_institutecode" class="select2_group form-control" required>
                                                      <option value="" selected="selected">-- Select --</option>
                                                      <?php 
                                                        $institute_set = Im_Mr_Institute::find_all();
                                                        foreach($institute_set as $institute){
                                                          if($institute->iit_institutecode == $sel_constantcode->ict_institutecode){
                                                            echo "<option value={$institute->iit_institutecode} selected='selected'>{$institute->iit_institutename}</option>";
                                                          }else{
                                                            echo "<option value={$institute->iit_institutecode}>{$institute->iit_institutename}</option>";
                                                          }
                                                        }
                                                      ?>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"><?php echo LABEL_INSTITUTE_NAME ?></span>
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