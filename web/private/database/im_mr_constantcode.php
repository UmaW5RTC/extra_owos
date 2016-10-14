<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Constantcode extends DatabaseObject {
	
	protected static $table_name="im_mr_constantcode";
	protected static $db_fields = array('ict_constantcode', 'ict_constantname','ict_constantcodeprefix','ict_institutecode','ict_createdby','ict_createddate','ict_modifiedby','ict_modifieddate');
	
	public $ict_constantcode;
	public $ict_constantname;
	public $ict_constantcodeprefix;
	public $ict_institutecode;
	public $ict_createdby;
	public $ict_createddate;
	public $ict_modifiedby;
	public $ict_modifieddate;

	protected static $primarykey = "ict_constantcode";

	public static function find_INS_by_constantvalcode($id=0) {
	    $result_array = static::find_by_sql("SELECT * FROM im_mr_constantcode WHERE ict_constantcode='{$id}' LIMIT 1 ");
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	
}

?>