<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Masters</a></li>
    <li class="active"><strong>View Institute</strong></li>
</ol>
  <div align="left"><p style="padding-left: 1cm;"><a href="<?php echo BASE;?>/Masters/add_institute" class="btn btn-success btn-xs">Add New</a></p></div>
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <table id="example" class="table table-striped responsive-utilities jambo_table display responsive nowrap" style="width: 100%;">
                <thead>
                    <tr>
                    <th>Institue Code </th>
                    <th>Institute Name </th>                                                
                    <th class="all">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $institute_set = Im_Mr_Institute::find_all();?>
                    <?php foreach($institute_set as $institute): ?>
                    <tr>
                    <td><?php echo $institute->iit_institutecode; ?></td>
                    <td><?php echo $institute->iit_institutename; ?></td> 
                    <td>
                    <div class="btn-group">
                        <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo BASE;?>/Masters/edit_institute/<?php echo $institute->iit_institutecode; ?>">
                                <i class="icon-pencil"></i> Edit </a>
                            </li>
                            <li>
                                <a href="<?php echo BASE;?>/Masters/delete_institute/<?php echo $institute->iit_institutecode; ?>" onclick="return confirm('Are you sure to delete the Institute - <?php echo $institute->iit_institutecode; ?>?');">
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