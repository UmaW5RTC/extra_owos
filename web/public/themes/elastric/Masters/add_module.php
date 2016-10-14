<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Masters</a></li>
    <li class="active"><strong>Add Module </strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulegroupcode">Add Module Group
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select name="imo_modulegroupcode" id="imo_modulegroupcode" class="select2_group form-control" required >
                                                        <option value="" selected="selected">-- Select --</option>
                                                        <?php 
                                                            $group_set = Im_Mr_ModuleGroup::find_all();
                                                            foreach($group_set as $group){
                                                             echo '<option value="' . $group->imr_modulegroupcode . '">' . $group->imr_modulegroupname . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Add Module Group</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulecode">Module Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Code" name="imo_modulecode" required="required" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Code</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_moduleiconname">Module Icon Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Icon Name" name="imo_moduleiconname" required="required">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Icon Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulepagename">Module Page Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Page Name" name="imo_modulepagename" required="required" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Page Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulename">Module Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Name" name="imo_modulename" required="required" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulename_hi">Module Group Name Hindi
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Group Name Hindi" required="required" name="imo_modulename_hi">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Group Name Hindi</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_modulename_or">Module Group Name Odiya
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Group Name Odiya" required="required" name="imo_modulename_or" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Group Name Odiya</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_moduleorder">Module Order
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Module Order" name="imo_moduleorder" required="required" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Module Order</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_applicationcode">Add Application
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="imo_applicationcode" id="imo_applicationcode" class="select2_group form-control" required >
                                                        <option value="" selected="selected">-- Select --</option>
                                                        <?php 
                                                            $application_set = IM_Mr_Application::find_all();
                                                            foreach($application_set as $application){
                                                             echo '<option value="' . $application->iap_applicationcode . '">' . $application->iap_applicationname . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Institute Name</span>
                                                </div>                                              
                                            </div>                                              
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="icy_institutecode">Institute Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="imo_institutecode" id="icy_institutecode" class="select2_group form-control" required >
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
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="imo_moduleorder">Status
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <p>
                                                        Active :
                                                        <input type="radio" class="flat" name="imo_modulestatus" value="Active" checked="" required /> 
                                                        Inactive :
                                                        <input type="radio" class="flat" name="imo_modulestatus" value="Inactive" />
                                                    </p>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Status</span>
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