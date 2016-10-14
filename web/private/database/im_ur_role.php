<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Ur_Role extends DatabaseObject {
	
	protected static $table_name="im_ur_role";
	protected static $db_fields = array('iro_rolecode','iro_rolename','iro_rolelevel','iro_institutecode','iro_createdby','iro_createddate','iro_modifiedby','iro_modifieddate', 'iro_applicationcode');
	
	public $iro_rolecode;
	public $iro_rolename;
	public $iro_rolelevel;
	public $iro_institutecode;
	public $iro_applicationcode;
	public $iro_createdby;
	public $iro_createddate;
	public $iro_modifiedby;
	public $iro_modifieddate;

	protected static $primarykey = "iro_rolecode";
	
}

?>