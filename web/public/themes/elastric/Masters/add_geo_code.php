<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Add Geo Code</strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_geocode">Geo Location ID
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Geo Location ID" name="ige_geocode" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Geo Location ID</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_geocodename">Geo Code Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Geo Code Name" name="ige_geocodename" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Geo Code Name</span>
                    </div>                                              
                </div>
                
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_countrycode">Country Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <select name="ige_countrycode" id="ige_countrycode" class=" form-control" required onchange="GetState(this);">
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
                            <select name="statecode" id="statecode" class=" form-control" required onchange="GetDistrict(this);">
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
                            <select name="districtcode" id="districtcode" class=" form-control" required >
                                <option value="" selected="selected">-- Select --</option>
                            </select>
                        </div>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">District Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_timezonecode">Add Time Zone
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <select name="ige_timezonecode" id="ige_timezonecode" class="select2_group form-control" required >
                            <option value="" selected="selected">-- Select --</option>
                            <?php 
                                $timezone_set = Im_Mr_Timezone::find_all();
                                foreach($timezone_set as $timezone){
                                 echo '<option value="' . $timezone->itz_timezonecode . '">' . $timezone->itz_timezonename . '</option>';
                                }
                            ?>
                        </select>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Add Time Zone</span>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_postalcode">Add Pin Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <select name="ige_postalcode" id="ige_postalcode" class="select2_group form-control" required >
                            <option value="" selected="selected">-- Select --</option>
                            <?php 
                                $po_set = Im_Mr_Postoffice::find_all();
                                foreach($po_set as $po){
                                 echo '<option value="' . $po->ipo_poid . '">' . $po->ipo_poname . '</option>';
                                }
                            ?>
                        </select>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Add Pin Code</span>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_languagecode">Add Language
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <select name="ige_languagecode" id="ige_languagecode" class="select2_group form-control" required >
                            <option value="" selected="selected">-- Select --</option>
                            <?php 
                                $language_set = Im_Mr_Language::find_all();
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
                    <label class="col-md-3 control-label" for="ige_region1">Region 1
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Region 1" name="ige_region1" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Region 1</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_region2">Region 2
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Region 2" name="ige_region2" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Region 2</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_region3">Region 3
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Region 3" name="ige_region3" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Region 3</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_region4">Region 4
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="Region 4" name="ige_region4" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Region 4</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_locality">Locality Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="Locality Name" name="ige_locality" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Locality Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_suburb">Suburb Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Suburb Name" name="ige_suburb" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Suburb Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_street">Street Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Street Name" name="ige_street" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Street Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_range">Range Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="Range Name" name="ige_range" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Range Name</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_elevation">Elevation
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="Elevation" name="ige_elevation" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Elevation</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_iso2">ISO2 Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="ISO2 Code" name="ige_iso2" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">ISO2 Code</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_fips">FIPS Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="FIPS Code" name="ige_fips" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">FIPS Code</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_nuts">NUTS Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control" placeholder="NUTS Code" name="ige_nuts" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">NUTS Code</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_hasc">HASC Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="HASC Code" name="ige_hasc" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">HASC Code</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_stat">STAT Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="STAT Code" name="ige_stat" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">STAT Code</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_latitude">Latitude
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Latitude" name="ige_latitude" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Latitude</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_longitude">Longitude
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Longitude" name="ige_longitude" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">Longitude</span>
                    </div>                                              
                </div>                                          
                
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="ige_institutecode">Institute Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                       <select name="ige_institutecode" id="ige_institutecode" class="select2_group form-control" required >
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