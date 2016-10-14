<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>Add District</strong></li>
</ol>
 
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                <?php echo csrf_token_tag(); ?>
                <p><code>*</code> Marked Fields Are Compulsory</a></p>
                
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="idt_countrycode">Country Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                       <select name="idt_countrycode" id="idt_countrycode" class="form-control" required onchange="GetState(this);">
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
                    <label class="col-md-3 control-label" for="ist_statecode">State Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <div id="state">
                            <select name="statecode" id="statecode" class="select2_group form-control" required >
                                <option value="" selected="selected">-- Select --</option>
                            </select>
                        </div>
                        <div class="form-control-focus"> </div>
                        <span class="help-block">State Name</span>
                    </div>
                </div>

                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="idt_districtcode">District Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="District Code" name="idt_districtcode" required="required" onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">District Code</span>
                    </div>                                              
                </div>
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="idt_districtname">District Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="District Name" name="idt_districtname" required="required"  onkeydown="upperCaseF(this)">
                        <div class="form-control-focus"> </div>
                        <span class="help-block">District Name</span>
                    </div>                                              
                </div>      
                <div class="form-group form-md-line-input">
                    <label class="col-md-3 control-label" for="idt_institutecode">Institute Name
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6">
                       <select name="idt_institutecode" id="idt_institutecode" class="select2_group form-control" required >
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

<?php include('layouts/app_bottom.php'); ?>