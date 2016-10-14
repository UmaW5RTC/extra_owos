<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>

<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">User Module</a></li>
    <li><a href="#">User Role Listing</a></li>
    <li id="tenant-help">
        <a class="" href="#" onclick="popUp(&#39;help/?id_nodo=themes_system&amp;name_nodo=Themes&#39;,&#39;1000&#39;,&#39;460&#39;)"><i class="fa fa-support"></i></a></li>
    <li id="tenant-sticky" class="dropdown">
        <a id="togglestickynote1" href="#"><i class="fa fa-sticky-note"></i></a>
    </li>
</ol>
<div align="left"><p style="padding-left: 1cm;"><a href="<?php echo BASE;?>/user_module/add_user_role" class="btn btn-success btn-xs">Add New</a></p></div>
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
           <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr class="headings">
                    <th>Role Code </th>
                    <th>Role Name </th>                                                
                    <th class=" no-link last"><span class="nobr">Action</span></th>
                </tr>
                </thead>
                <?php $role_set = Im_Ur_Role::find_all();?>

                <tbody>                                                
                    <?php foreach($role_set as $role): ?>
                    <tr>
                    <td><?php echo $role->iro_rolecode; ?></td>
                    <td><?php echo $role->iro_rolename; ?></td> 
                    <td>
                    <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo BASE;?>/user_module/edit_user_role/<?php echo $role->iro_rolecode; ?>">
                                <i class="icon-pencil"></i> Edit </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE;?>/user_module/delete_user_role/<?php echo $role->iro_rolecode; ?>" onclick="return confirm('Are you sure to delete the User Role - <?php echo $role->iro_rolecode; ?>?');">
                                <i class="icon-trash"></i> Delete </a>
                            </li>
                        </ul>
                    </div>
                    </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script>
$(document).ready( function () {
    $('#example').dataTable( {
        "dom": 'T<"clear">lfrtip',
        "sPaginationType": "full_numbers",
        "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [2]
                } //disables sorting for column one
        ],
        "tableTools": {
            "sSwfPath": "<?php echo get_site_current_theme_url(); ?>/js/Datatables/tools/swf/copy_csv_xls_pdf.swf",
            "aButtons": [
            {
                "sExtends": "copy",
                "mColumns": [0, 1]
            },
            {
                "sExtends": "xls",
                "mColumns": [0, 1]
            },
            {
                "sExtends": "pdf",
                "mColumns": [0, 1]
            },
            {
                "sExtends": "print",
                "mColumns": [0, 1]
            },
        ]
        }
    } );
} );

</script>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/foot.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/app_bottom.php");?>