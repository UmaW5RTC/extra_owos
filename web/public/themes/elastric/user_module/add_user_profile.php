<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>

<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">User Module</a></li>
    <li><a href="#">Add User Profile</a></li>
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
                <label class="col-md-3 control-label" for="ius_loginid">Login Name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Login Name" name="ius_loginid" id="ius_loginid" required="">
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ius_emailid">E-mail ID
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="E-mail ID" name="ius_emailid" id="ius_emailid" required="">
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ius_username">User Name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="User Name" name="ius_username" id="ius_username" required="">
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ius_password">Password
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="password" class="form-control" placeholder="Password" name="ius_password" id="ius_password" required="">
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ius_c_password">Confirm Password
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="password" class="form-control" placeholder="Confirm Password" id="ius_c_password" required="" data-parsley-equalto="#ius_password" >
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ius_rolecode">User Role
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                   <select name="ius_rolecode" id="ius_rolecode" class="select2_group form-control" required >
                    <option value="" selected="selected">-- Select --</option>
                    <?php 
                        $role_set = Im_Ur_Role::find_all();
                        foreach($role_set as $role){
                         echo '<option value="' . $role->iro_rolecode . '">' . $role->iro_rolename . '</option>';
                        }
                    ?>
                </select>
                </div>                                              
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="ius_status">User Status
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <p>
                        Suspended
                        <input type="radio" class="flat" name="ius_status" value="Suspended" checked="" required /> 
                        Active
                        <input type="radio" class="flat" name="ius_status" value="Active" />
                    </p>
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
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/app_bottom.php");?>