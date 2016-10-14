<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Ur_Onlineuser extends DatabaseObject {
	
	protected static $table_name="im_ur_onlineuser";
	protected static $db_fields = array('iou_userid', 'iou_logintime','iou_ipaddress','iou_os','iou_browser','iou_institutecode','ist_createdby','ist_createddate','ist_modifiedby','ist_modifieddate');
	
	public $iou_userid;
	public $iou_logintime;
	public $iou_ipaddress;
	public $iou_os;
	public $iou_browser;
	public $iou_institutecode;
	public $ist_createdby;
	public $ist_createddate;
	public $ist_modifiedby;
	public $ist_modifieddate;

	protected static $primarykey = "iou_userid";

}

?>