<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Language extends DatabaseObject {
	
	protected static $table_name="im_mr_language";
	protected static $db_fields = array('ilu_languagecode', 'ilu_languagename','ilu_institutecode','ilu_createdby','ilu_createddate','ilu_modifiedby','ilu_modifieddate');
	
	public $ilu_languagecode;
	public $ilu_languagename;
	public $ilu_institutecode;
	public $ilu_createdby;
	public $ilu_createddate;
	public $ilu_modifiedby;
	public $ilu_modifieddate;

	protected static $primarykey = "ilu_languagecode";
	
}

?>