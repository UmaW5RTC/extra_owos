<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Error extends DatabaseObject {
	
	protected static $table_name="im_mr_error";
	protected static $db_fields = array('irr_code', 'irr_message', 'irr_languagecode', 'irr_institutecode', 'irr_createdby','irr_createddate','irr_modifiedby','irr_modifieddate');
	
	public $irr_code;
	public $irr_message;
	public $irr_languagecode;
	public $irr_institutecode;
	public $irr_createdby;
	public $irr_createddate;
	public $irr_modifiedby;
	public $irr_modifieddate;

	protected static $primarykey = "irr_code";
	
}

?>