<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Application extends DatabaseObject {
	
	protected static $table_name="im_mr_application";
	protected static $db_fields = array('iap_applicationcode', 'iap_applicationname', 'iap_institutecode', 'iap_createdby','iap_createddate','iap_modifiedby','iap_modifieddate');
	
	public $iap_applicationcode;
	public $iap_applicationname;
	public $iap_institutecode;
	public $iap_createdby;
	public $iap_createddate;
	public $iap_modifiedby;
	public $iap_modifieddate;

	protected static $primarykey = "iap_applicationcode";
	
}

?>