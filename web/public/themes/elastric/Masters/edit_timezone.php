<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Edit state</strong></li>
</ol>

<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_countrycode">Country Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <input type="text" class="form-control" placeholder="Timezone Code" value="<?php echo $sel_timezone->itz_countrycode; ?>" name="itz_countrycode" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Country Name</span>
                                                </div>
                                            </div>                                                                                      
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_timezoneabbr">Time Zone Abbreviation
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <input type="text" class="form-control" placeholder="Timezone Code" name="itz_timezoneabbr" value="<?php echo $sel_timezone->itz_timezoneabbr; ?>" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Time Zone Abbreviation</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_timezonecode">Timezone Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone Code" value="<?php echo $sel_timezone->itz_timezonecode; ?>" name="itz_timezonecode" onkeydown="upperCaseF(this)" readonly>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone Code</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_timezonename">Timezone Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone Name" value="<?php echo $sel_timezone->itz_timezonename; ?>" name="itz_timezonename" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_utc">Timezone UTC Offset
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone UTC Offset" value="<?php echo $sel_timezone->itz_utc; ?>" name="itz_utc" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone UTC Offset</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_dst">Timezone DST
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone DST" value="<?php echo $sel_timezone->itz_dst; ?>" name="itz_dst" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone DST</span>
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