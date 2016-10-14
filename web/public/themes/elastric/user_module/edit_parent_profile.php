<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>

<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">User Module</a></li>
    <li><a href="#">Add Parent Profile</a></li>
    <li id="tenant-help">
        <a class="" href="#" onclick="popUp(&#39;help/?id_nodo=themes_system&amp;name_nodo=Themes&#39;,&#39;1000&#39;,&#39;460&#39;)"><i class="fa fa-support"></i></a></li>
    <li id="tenant-sticky" class="dropdown">
        <a id="togglestickynote1" href="#"><i class="fa fa-sticky-note"></i></a>
    </li>
</ol>

<?php echo output_message($message, $message_type); ?>

<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo csrf_token_tag(); ?>
            <p><code>*</code> Marked Fields Are Compulsory</a></p>

            <div class="form-group">
                <div id="kv-avatar-errors" class="center-block" style="width: 600px;display:none"></div>
                <div class="kv-avatar center-block" style="width:200px">
                    <input id="avatar" name="uploadedimage" type="file" class="file-loading" accept=".gif,.jpg,.jpeg,.png">
                </div>
            </div> 

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_parentprofcode">Parent Profile Code
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Parent Profile Code" name="ipr_parentprofcode" id="ipr_parentprofcode" value="<?php echo $sel_user->ipr_parentprofcode; ?>" required="" readonly >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_title">Title
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <p>

                        Mr
                        <input type="radio" class="flat" name="ipr_title" value="Mr" 
                        <?php if($sel_user->ipr_title == 'Mr'){echo 'checked=""';}?> />  
                        Mrs
                        <input type="radio" class="flat" name="ipr_title" value="Mrs" 
                        <?php if($sel_user->ipr_title == 'Mrs'){echo 'checked=""';}?> /> 
                        Ms
                        <input type="radio" class="flat" name="ipr_title" value="Ms" 
                        <?php if($sel_user->ipr_title == 'Ms'){echo 'checked=""';}?> /> 
                        Miss
                        <input type="radio" class="flat" name="ipr_title" value="Miss" 
                        <?php if($sel_user->ipr_title == 'Miss'){echo 'checked=""';}?> /> 
                        Mx
                        <input type="radio" class="flat" name="ipr_title" value="Mx" 
                        <?php if($sel_user->ipr_title == 'Mx'){echo 'checked=""';}?> /> 
                        Mtr
                        <input type="radio" class="flat" name="ipr_title" value="Mtr" 
                        <?php if($sel_user->ipr_title == 'Mtr'){echo 'checked=""';}?> /> 
                        Dr
                        <input type="radio" class="flat" name="ipr_title" value="Dr" 
                        <?php if($sel_user->ipr_title == 'Dr'){echo 'checked=""';}?> /> 
                    </p>
                </div>                                              
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_name">First Name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="First Name" name="ipr_name" id="ipr_name" required="" value="<?php echo $sel_user->ipr_name; ?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_surname">Last Name
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Last Name" name="ipr_surname" id="ipr_surname" value="<?php echo $sel_user->ipr_surname; ?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_age">Age
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Age" name="ipr_age" id="ipr_age" required="" value="<?php echo $sel_user->ipr_age; ?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_sex">Sex
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <p>
                        Male
                        <input type="radio" class="flat" name="ipr_sex" value="Male" 
                        <?php if($sel_user->ipr_sex == 'Male'){echo 'checked=""';}?> /> 
                        Female
                        <input type="radio" class="flat" name="ipr_sex" value="Female" 
                        <?php if($sel_user->ipr_sex == 'Female'){echo 'checked=""';}?> />
                        Other
                        <input type="radio" class="flat" name="ipr_sex" value="Other" 
                        <?php if($sel_user->ipr_sex == 'Other'){echo 'checked=""';}?> />
                    </p>
                </div>                                              
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_dob">Date Of Birth
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="ipr_dob" id="ipr_dob" required="" value="<?php echo $sel_user->ipr_dob; ?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_religion">Religion
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <p>
                        Hindu
                        <input type="radio" class="flat" name="ipr_religion" value="Hindu" 
                        <?php if($sel_user->ipr_religion == 'Hindu'){echo 'checked=""';}?> /> 
                        Christian
                        <input type="radio" class="flat" name="ipr_religion" value="Christian" 
                        <?php if($sel_user->ipr_religion == 'Christian'){echo 'checked=""';}?> />
                        Islam
                        <input type="radio" class="flat" name="ipr_religion" value="Islam" 
                        <?php if($sel_user->ipr_religion == 'Islam'){echo 'checked=""';}?> />
                        Sikh
                        <input type="radio" class="flat" name="ipr_religion" value="Sikh" 
                        <?php if($sel_user->ipr_religion == 'Sikh'){echo 'checked=""';}?> />
                        Buddh
                        <input type="radio" class="flat" name="ipr_religion" value="Buddh" 
                        <?php if($sel_user->ipr_religion == 'Buddh'){echo 'checked=""';}?> />
                    </p>
                </div>                                              
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_address">Address
                </label>
                <div class="col-md-6">
                    <textarea class="form-control" name="ipr_address" id="ipr_address"><?php echo $sel_user->ipr_address; ?></textarea>
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_emailid">E-mail
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="E-mail" name="ipr_emailid" id="ipr_emailid" value="<?php echo $sel_user->ipr_emailid; ?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_mobile">Mobile
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Mobile" name="ipr_mobile" id="ipr_mobile" value="<?php echo $sel_user->ipr_mobile; ?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_resno">Land Line
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Land Line" name="ipr_resno" id="ipr_resno" value="<?php echo $sel_user->ipr_resno; ?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_job">Job
                </label>
                <div class="col-md-6">
                    <textarea class="form-control" name="ipr_job" id="ipr_job" ><?php echo $sel_user->ipr_job; ?></textarea>
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ipr_countrycode">Country Name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <select name="ipr_countrycode" id="ipr_countrycode" class=" form-control" onchange="GetState(this);" required="">
                    <option value="" selected="selected">-- Select --</option>
                    <?php 
                        $country_set = Im_Mr_Country::find_all();
                        foreach($country_set as $country){
                        if ($country->icy_countrycode == $sel_user->ipr_countrycode) {
                            echo '<option value="' . $country->icy_countrycode . '" selected>' . $country->icy_countryname . '</option>';
                        }else{
                            echo '<option value="' . $country->icy_countrycode . '">' . $country->icy_countryname . '</option>';
                        }
                        }
                    ?>
                </select>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">Country Name</span>
                </div>
            </div>  
            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="statecode">State Name
                    
                </label>
                <div class="col-md-6">
                    <div id="state">
                        <select name="statecode" id="statecode" class=" form-control" onchange="GetDistrict(this);GetGeo(this);">
                        <?php 
                        $state = Im_Mr_State::find_by_id($sel_user->ipr_statecode);
                        if ($state) {
                            echo '<option value="'.$state->ist_statecode.'" selected="selected">'.$state->ist_statename.'</option>';
                        }else{
                            echo '<option value="" selected="selected">-- Select --</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">State Name</span>
                </div>                                              
            </div>
            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="districtcode">District Name
                    
                </label>
                <div class="col-md-6">
                    <div id="district">
                        <select name="districtcode" id="districtcode" class=" form-control" onchange="GetPost(this);">
                        <?php 
                        $district = Im_Mr_District::find_by_id($sel_user->ipr_districtcode);
                        if ($district) {
                            echo '<option value="'.$district->idt_districtcode.'" selected="selected">'.$district->idt_districtname.'</option>';
                        }else{
                            echo '<option value="" selected="selected">-- Select --</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-control-focus"> </div>
                    <span class="help-block">District Name</span>
                </div>                                              
            </div>
            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="post">Post Office
                </label>
                <div class="col-md-6">
                    <div id="post_div">
                        <select name="post" id="post" class=" form-control" onchange="GetPincode(this);">
                        <?php 
                        $post = Im_Mr_Postoffice::find_by_id($sel_user->ipr_poid);
                        if ($post) {
                            echo '<option value="'.$post->ipo_poid.'" selected="selected">'.$post->ipo_poname.'</option>';
                            $pin = $post->ipo_pincode;
                        }else{
                            echo '<option value="" selected="selected">-- Select --</option>';
                            $pin = "";
                        }
                        ?>
                        </select>
                    </div>
                </div>                                              
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="pincode">Pin Code
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="pincode" id="pincode" readonly="" value="<?php echo $pin;?>" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="geo">Geo Location 
                </label>
                <div class="col-md-6">
                    <div id="geo_div">
                        <select name="geo" id="geo" class=" form-control">
                        <?php 
                        $geo = Im_Mr_Geocode::find_by_id($sel_user->ipr_geocode);
                        if ($geo) {
                            echo '<option value="'.$geo->ige_geocode.'" selected="selected">'.$geo->ige_geocodename.'</option>';
                        }else{
                            echo '<option value="" selected="selected">-- Select --</option>';
                        }
                        ?>
                        </select>
                    </div>
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

<link href="<?php echo get_site_current_theme_url(); ?>/file/fileinput.css" media="all" rel="stylesheet" title="gray-theme" type="text/css" />
<script src="<?php echo get_site_current_theme_url(); ?>/file/fileinput.js" type="text/javascript"></script>
<script>
var btnCust = '<button type="button" class="btn btn-default btn-sm" title="Add picture tags" ' + 
  'onclick="alert(\'Call your custom code here.\')">' +
  '<i class="fa fa-tag"></i>' +
  '</button>'; 
$("#avatar").fileinput({
  overwriteInitial: true,
  maxFileSize: 1024,
  showClose: false,
  showCaption: false,
  browseLabel: '',
  removeLabel: '',
  browseIcon: '<i class="fa fa-folder-open"></i> Browse',
  removeIcon: '<i class="fa fa-remove"></i> Remove',
  removeTitle: 'Cancel or reset changes',
  elErrorContainer: '#kv-avatar-errors',
  msgErrorClass: 'alert alert-block alert-danger',
  defaultPreviewContent: '<img src="http://localhost/IMS/web/public/themes/elastric/images/Icon-user.png" alt="Photo" style="width:160px">',
  layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
  allowedFileExtensions: ["jpg", "png", "gif"]
});
</script>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/foot.php");?>
<script>
function GetState(sel) {
    var country_id = sel.options[sel.selectedIndex].value;
    $("#state").html( "" );
    if (country_id.length > 0 ) {
        $.ajax({
        type: "GET",
        dataType:'html',
        url: "../../ajax/get_state.php",
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
        url: "../../ajax/get_district.php",
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

<script>
function GetGeo(sel) {
    var state_id = sel.options[sel.selectedIndex].value;
    $("#geo_div").html( "" );
    if (state_id.length > 0 ) {
        $.ajax({
        type: "GET",
        dataType:'html',
        url: "../../ajax/get_geo.php",
        data:'id='+state_id,
        cache: false,
        beforeSend: function () {
            $('#geo_div').html('<select name="geo" id="geo" class="select2_group form-control" required ><option value="" selected="selected">-- Select --</option></select>');
          },
        success: function(html){
            $("#geo_div").html( html );
             }
         });
     }
}
</script>

<script>
function GetPost(sel) {
    var district_id = sel.options[sel.selectedIndex].value;
    $("#post_div").html( "" );
    if (district_id.length > 0 ) {
        $.ajax({
        type: "GET",
        dataType:'html',
        url: "../../ajax/get_post.php",
        data:'id='+district_id,
        cache: false,
        beforeSend: function () {
            $('#post_div').html('<select name="post" id="post" class="select2_group form-control" ><option value="" selected="selected">-- Select --</option></select>');
          },
        success: function(html){
            $("#post_div").html( html );
             }
         });
     }
}
</script>

<script>
function GetPincode(sel) {
    var post_id = sel.options[sel.selectedIndex].value;
    if (post_id.length > 0 ) {
        $.ajax({
        type: "GET",
        dataType:'json',
        url: "../../ajax/get_pincode.php",
        data:'id='+post_id,
        cache: false,
        success: function(data){
            $("#pincode").val(data.pincode);
            }
         });
     }
}
</script>

<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/app_bottom.php");?>