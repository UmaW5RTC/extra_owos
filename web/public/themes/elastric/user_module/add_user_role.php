<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>

<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">User Module</a></li>
    <li><a href="#">Add Role Code</a></li>
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
            <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?php echo csrf_token_tag(); ?>
            <p><code>*</code> Marked Fields Are Compulsory</a></p>
            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="iro_rolecode">Role Code
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Role Code" name="iro_rolecode">
                </div>
            </div>

            <div class="form-group form-md-line-input">
                <label class="col-md-3 control-label" for="iro_rolename">Role Name
                    <span class="required">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Role Name" name="iro_rolename">
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