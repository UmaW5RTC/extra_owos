<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Module extends DatabaseObject {
	
	protected static $table_name="im_mr_module";
	protected static $db_fields = array('imo_modulecode','imo_moduleiconname','imo_modulename','imo_modulename_hi','imo_modulename_or','imo_moduleorder','imo_modulepagename','imo_modulestatus','imo_modulegroupcode','imo_applicationcode','imo_institutecode','imo_createdby','imo_createddate','imo_modifiedby','imo_modifieddate');

	public $imo_modulecode;
	public $imo_moduleiconname;
	public $imo_modulename;
	public $imo_modulename_hi;
	public $imo_modulename_or;
	public $imo_moduleorder;
	public $imo_modulepagename;
	public $imo_modulestatus;
	public $imo_modulegroupcode;
	public $imo_applicationcode;
	public $imo_institutecode;
	public $imo_createdby;
	public $imo_createddate;
	public $imo_modifiedby;
	public $imo_modifieddate;

	protected static $primarykey = "imo_modulecode";
	
	public static function find_by_modulecode($code, $ins_code) {
		$sql = "SELECT * FROM ".static::$table_name." WHERE imo_modulecode = '{$code}' AND imo_institutecode = '{$ins_code}' ";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
  	}

	public static function find_all_by_modulegroupcode($code, $ins_code) {
		$sql = "SELECT * FROM ".static::$table_name." WHERE imo_modulegroupcode = '{$code}' AND imo_institutecode = '{$ins_code}'";
		return static::find_by_sql($sql);
  	}

}

?>