<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>
<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active"><strong>View Constant Value</strong></li>
</ol>
  <div align="left"><p style="padding-left: 1cm;"><a href="<?php echo BASE;?>/Masters/add_constant_value" class="btn btn-success btn-xs">Add New</a></p></div>
<?php echo output_message($message, $message_type); ?>
<div id="neo-contentbox">
    <div id="neo-contentbox-maincolumn">
        <div class="neo-module-content">
            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                            <thead>
                                                <tr class="headings">
                                                <th>Constant Value Code </th>
                                                <th>Constant Value Name </th>
                                                <th>Constant Code</th>
                                                <th>Institute Code</th>
                                                <th class=" no-link last"><span class="nobr">Action</span></th>
                                                </tr>
                                            </thead>
                                            <?php $constant_value = Im_Mr_Constantvalue::find_all();?>
                                            <tbody>                                               
                                                <?php foreach($constant_value as $constant): ?>
                                            <tr>
                                            <td><?php echo $constant->icv_constantvalcode; ?></td>
                                            <td><?php echo $constant->icv_constantvalname; ?></td>
                                            <td><?php echo $constant->icv_constantcode; ?></td>
                                            <td>
                                                <?php 
                                                    $institute = Im_Mr_Institute::find_by_id($constant->icv_institutecode);
                                                    echo $institute->iit_institutename; 
                                                ?>
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="<?php echo BASE;?>/Masters/edit_constant_value/<?php echo $constant->icv_constantvalcode; ?>">
                                                            <i class="icon-pencil"></i> Edit </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo BASE;?>/Masters/delete_constant_value/<?php echo $constant->icv_constantvalcode; ?>" onclick="return confirm('Are you sure to delete the Constant - <?php echo $constant->ict_constantcode; ?>?');">
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
    $('#sample_3').dataTable( {
        "dom": 'T<"clear">lfrtip',
        "sPaginationType": "full_numbers",
        "aoColumnDefs": [
                {
                    'bSortable': false,
                    'aTargets': [4]
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