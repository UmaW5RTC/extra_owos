<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Add Error Code</strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="irr_code">Error Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" required="required" placeholder="Error Code" name="irr_code">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Error Code</span>
                                                </div>
                                            </div>

                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="irr_message">Error Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" required="required" placeholder="Error Name" name="irr_message" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Error Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="irr_languagecode">Add Language
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="irr_languagecode" id="irr_languagecode" class="select2_group form-control" required >
                                                        <option value="" selected="selected">-- Select --</option>
                                                        <?php 
                                                        $language_set = IM_Mr_Language::find_all();
                                                        foreach($language_set as $language){
                                                         echo '<option value="' . $language->ilu_languagecode . '">' . $language->ilu_languagename . '</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Add Language</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="irr_institutecode">Institute Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="irr_institutecode" id="irr_institutecode" class="select2_group form-control" required >
                                                        <option value="" selected="selected">-- Select --</option>
                                                        <?php 
                                                            $institute_set = IM_Mr_Institute::find_all();
                                                            foreach($institute_set as $institute){
                                                             echo '<option value="' . $institute->iit_institutecode . '">' . $institute->iit_institutename . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Institute Name</span>
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