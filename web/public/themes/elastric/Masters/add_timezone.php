<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Add Timezone</strong></li>
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
                                                    <select name="itz_countrycode" id="itz_countrycode" class="select2_group form-control" required >
                                                    <option value="" selected="selected">-- Select --</option>
                                                    <?php 
                                                        $country_set = Im_Mr_Country::find_all();
                                                        foreach($country_set as $country){
                                                         echo '<option value="' . $country->icy_countrycode . '">' . $country->icy_countryname . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Country Name</span>
                                                </div>
                                            </div>                                                                                      
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_timezoneabbr">Time Zone Abbreviation
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="itz_timezoneabbr" id="itz_timezoneabbr" class="select2_group form-control" required >
                                                        <option value="" selected="selected">-- Select --</option>
                                                        <?php 
                                                            $timezone_set = Im_Mr_Constantvalue::find_all_by_constatntcode('TZ');
                                                            foreach($timezone_set as $timezone){
                                                             echo '<option value="' . $timezone->icv_constantvalcode . '">' . $timezone->icv_constantvalname . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Time Zone Abbreviation</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_timezonecode">Timezone Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone Code" name="itz_timezonecode" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone Code</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_timezonename">Timezone Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone Name" name="itz_timezonename" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone Name</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_utc">Timezone UTC Offset
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone UTC Offset" name="itz_utc" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone UTC Offset</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_dst">Timezone DST
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Timezone DST" name="itz_dst" onkeydown="upperCaseF(this)">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Timezone DST</span>
                                                </div>                                              
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="itz_institutecode">Institute Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6">
                                                   <select name="itz_institutecode" id="itz_institutecode" class="select2_group form-control" required >
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