<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>

<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">User Module</a></li>
    <li><a href="#">Edit Role Code</a></li>
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

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#role" aria-controls="role" role="tab" data-toggle="tab">Role</a></li>
                <li role="presentation"><a href="#rights" aria-controls="rights" role="tab" data-toggle="tab">Rights</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="role">
                    <form id="form" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <p><code>*</code> Marked Fields Are Compulsory</a></p>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="iro_rolecode">Role Code
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Role Code" value="<?php echo $sel_role->iro_rolecode; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="iro_rolename">Role Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Role Name" name="iro_rolename" value="<?php echo $sel_role->iro_rolename; ?>">
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

                <div role="tabpanel" class="tab-pane" id="rights">
                    <form id="form" action="" method="post" class="form-horizontal form-label-left">
                    <p><code>*</code> Marked Fields Are Compulsory</a></p>
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="iro_rolecode">Role Code
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Role Code" value="<?php echo $sel_role->iro_rolecode; ?>" readonly >
                        </div>
                    </div>

                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="iro_rolename">Role Name
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Role Name"  value="<?php echo $sel_role->iro_rolename; ?>" readonly >
                        </div>
                    </div>

                    <?php 
                    $role_right_set = Im_Ur_Rolerights::find_all_by_rolecode_1($sel_role->iro_rolecode, $sel_role->iro_institutecode); 
                    if ($role_right_set) {
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr class="headings">
                        <th>Module </th>
                        <td style="text-align: center;">Create </th>
                        <td style="text-align: center;">Edit </th>
                        <td style="text-align: center;">View </th>
                        <td style="text-align: center;">Delete </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($role_right_set as $role_right): ?>
                        <tr>
<td>
    <?php echo $role_right->irr_modulecode;?>
    <input type="hidden" name="modules[]" value="<?php echo $role_right->irr_modulecode ?>" >
</td>
<td style="text-align: center;">
    <input type="checkbox" value="yes" name="create_<?php echo $role_right->irr_modulecode ?>" 
    <?php echo ($role_right->irr_create == "Yes") ? 'checked' : ''; ?>  >
</td>
<td style="text-align: center;">
    <input type="checkbox" value="yes" name="edit_<?php echo $role_right->irr_modulecode ?>" 
    <?php echo ($role_right->irr_edit == "Yes") ? 'checked' : ''; ?>  >
</td>
<td style="text-align: center;">
    <input type="checkbox" value="yes" name="view_<?php echo $role_right->irr_modulecode ?>" 
    <?php echo ($role_right->irr_view == "Yes") ? 'checked' : ''; ?>  >
</td>
<td style="text-align: center;">
    <input type="checkbox" value="yes" name="delete_<?php echo $role_right->irr_modulecode ?>" 
    <?php echo ($role_right->irr_delete == "Yes") ? 'checked' : ''; ?>  >
</td>
                        </tr>
                    <?php endforeach; } ?>
                    </tbody>
                    </table>
                      
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <input id="send" type="reset" class="btn btn-primary" value="Reset">
                            <input id="send" type="submit" name="submit2" class="btn btn-success" value="Submit">
                        </div>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="clearfix"></div>

<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/foot.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/app_bottom.php");?>