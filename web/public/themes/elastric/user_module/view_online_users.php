<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/head.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/side_nav.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/top_nav.php");?>

<ol class="breadcrumb bc-2">
    <li><a href="#"> <i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">User Module</a></li>
    <li><a href="#">Online Users</a></li>
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
           <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr class="headings">
                    <th>Login Id </th>
                    <th>Login Time </th>
                    <th>I.P. </th>
                    <th>Os </th>
                    <th>Browser </th>                                                
                </tr>
                </thead>
                <?php $online_set = Im_Ur_Onlineuser::find_all();?>

                <tbody>                                                
                    <?php foreach($online_set as $online): ?>
                    <tr>
                    <td><?php echo $online->iou_userid; ?></td>
                    <td><?php echo $online->iou_logintime; ?></td> 
                    <td><?php echo $online->iou_ipaddress; ?></td> 
                    <td><?php echo $online->iou_os; ?></td> 
                    <td><?php echo $online->iou_browser; ?></td> 
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
<div class="clearfix"></div>

<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/foot.php");?>
<?php include(THEMES_DIR .'/'. USER_CURRENT_THEME . "/layouts/app_bottom.php");?>