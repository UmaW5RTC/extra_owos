<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Add Postal Code</strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ipo_countrycode">Country Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <select name="ipo_countrycode" id="ipo_countrycode" class="form-control" required onchange="GetState(this);">
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
                    <label class="col-md-3 control-label" for="statecode">State Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <div id="state">
                            <select name="statecode" id="statecode" class="form-control" required onchange="GetDistrict(this);">
                                <option value="" selected="selected">-- Select --</option>
                            </select>
                        </div>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">State Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="districtcode">District Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <div id="district">
                            <select name="districtcode" required="required" id="districtcode" class="form-control" required>
                                <option value="" selected="selected">-- Select --</option>
                            </select>
                        </div>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">State Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ipo_poid">Post Office Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="Post Office Code" name="ipo_poid">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Post Office Code</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ipo_poname">Post Office Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="Post Office Name" name="ipo_poname">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Post Office Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ipo_pincode">Post Office Pincode
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" required="required" placeholder="Post Office Pincode" name="ipo_pincode">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Post Office Pincode</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ipo_location">Post Office Location
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="Post Office Location" name="ipo_location">
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
                            <input type="radio" class="flat" name="ipo_potype" value="B.O" checked="" required /> 
                            H.O:
                            <input type="radio" class="flat" name="ipo_potype" value="H.O" />
                            S.O:
                            <input type="radio" class="flat" name="ipo_potype" value="S.O" />
                        </p>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ipo_institutecode">Institute Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                       <select name="ipo_institutecode" id="ipo_institutecode" class="select2_group form-control" required >
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

<?php include('layouts/foot.php'); ?>

<script>
function GetState(sel) {
    var country_id = sel.options[sel.selectedIndex].value;
    $("#state").html( "" );
    if (country_id.length > 0 ) {
        $.ajax({
        type: "GET",
        dataType:'html',
        url: "ajax/get_state.php",
        data:'id='+country_id,
        cache: false,
        beforeSend: function () {
            $('#state').html('<select name="statecode" id="statecode" class="select2_group form-control" required ><option value="" selected="selected">-- Select --</option></select>');
          },
        success: function(html){
            $("#state").html( html );
             }
         });
     }
}
</script>

<script>
function GetDistrict(sel) {
    var state_id = sel.options[sel.selectedIndex].value;
    $("#district").html( "" );
    if (state_id.length > 0 ) {
        $.ajax({
        type: "GET",
        dataType:'html',
        url: "ajax/get_district.php",
        data:'id='+state_id,
        cache: false,
        beforeSend: function () {
            $('#district').html('<select name="districtcode" id="districtcode" class="select2_group form-control" required ><option value="" selected="selected">-- Select --</option></select>');
          },
        success: function(html){
            $("#district").html( html );
             }
         });
     }
}
</script>

<?php include('layouts/app_bottom.php'); ?>