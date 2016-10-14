<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_ModuleGroup extends DatabaseObject {
	
	protected static $table_name="im_mr_modulegroup";
	protected static $db_fields = array('imr_modulegroupcode', 'imr_modulegroupname', 'imr_modulegroupname_hi', 'imr_modulegroupname_or', 'imr_modulegroupiconname', 'imr_modulegrouporder','imr_applicationcode','imr_institutecode', 'imr_createdby', 'imr_createddate', 'imr_modifiedby', 'imr_modifieddate');
	
	public $imr_modulegroupcode;
	public $imr_modulegroupname;
	public $imr_modulegroupname_hi;
	public $imr_modulegroupname_or;
	public $imr_modulegroupiconname;
	public $imr_modulegrouporder;
	public $imr_applicationcode;
	public $imr_institutecode;
	public $imr_createdby;
	public $imr_createddate;
	public $imr_modifiedby;
	public $imr_modifieddate;

	protected static $primarykey = "imr_modulegroupcode";
	
	public static function find_by_modulegroupcode($code, $ins_code) {
		$sql = "SELECT * FROM ".static::$table_name." WHERE imr_modulegroupcode = '{$code}' AND imr_institutecode = '{$ins_code}'";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
  	}

}

?>