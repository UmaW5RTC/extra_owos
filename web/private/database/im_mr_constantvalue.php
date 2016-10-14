<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Constantvalue extends DatabaseObject {
	
	protected static $table_name="im_mr_constantvalue";
	protected static $db_fields = array('icv_constantvalcode', 'icv_constantvalname','icv_constantcode','icv_institutecode','icv_createdby','icv_createddate','icv_modifiedby','icv_modifieddate');
	
	public $icv_constantvalcode;
	public $icv_constantvalname;
	public $icv_constantcode;
	public $icv_institutecode;
	public $icv_createdby;
	public $icv_createddate;
	public $icv_modifiedby;
	public $icv_modifieddate;

	protected static $primarykey = "icv_constantvalcode";

	public static function find_all_by_constatntcode($code="") {
	    global $database;
	    $sql = "SELECT * FROM " . self::$table_name;
	    $sql .= " WHERE icv_constantcode='" .$database->escape_value($code) ."'";
	    $sql .= " ORDER BY icv_constantvalcode ASC";
	    return self::find_by_sql($sql);
	}

}

?>