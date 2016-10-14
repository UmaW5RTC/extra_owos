<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>View Error Code</strong></li>
</ol>
  <div align="left"><p style="padding-left: 1cm;"><a href="<?php echo BASE;?>/Masters/add_error_code" class="btn btn-success btn-xs">Add New</a></p></div>
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <table class="table table-striped table-bordered table-hover" id="example">
                                            <thead>
                                                <tr class="headings">
                                                <th>Errors Code </th>
                                                <th>Errors Name </th>
                                                <th>Language </th>                                              
                                                <th class=" no-link last"><span class="nobr">Action</span></th>
                                            </tr>
                                            </thead>
                                            <?php $error_set = Im_Mr_Error::find_all();?>

                                            <tbody>                                                
                                               <?php foreach($error_set as $error): ?>
                                                <tr>
                                                <td><?php echo $error->irr_code; ?></td>
                                                <td><?php echo $error->irr_message; ?></td>
                                                <td><?php echo $error->irr_languagecode; ?></td>
                                                <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="<?php echo BASE;?>/Masters/edit_error_code/<?php echo $error->irr_code; ?>">
                                                            <i class="icon-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo BASE;?>/Masters/delete_error_code/<?php echo $error->irr_code; ?>" onclick="return confirm('Are you sure to delete the Institute - <?php echo $institute->iit_institutecode; ?>?');">
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
                    'aTargets': [3]
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