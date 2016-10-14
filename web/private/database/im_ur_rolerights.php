<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Ur_Rolerights extends DatabaseObject {
	
	protected static $table_name="im_ur_rolerights";
	protected static $db_fields = array('irr_rolecode','irr_modulecode','irr_create','irr_edit','irr_delete','irr_view','irr_approve','irr_reject','irr_cancel','irr_institutecode','irr_createdby','irr_createddate','irr_modifiedby','irr_modifieddate');
	
	public $irr_rolecode;
	public $irr_modulecode;
	public $irr_create;
	public $irr_edit;
	public $irr_delete;
	public $irr_view;
	public $irr_approve;
	public $irr_reject;
	public $irr_cancel;
	public $irr_institutecode;
	public $irr_createdby;
	public $irr_createddate;
	public $irr_modifiedby;
	public $irr_modifieddate;

	protected static $primarykey1 = "irr_rolecode";
	protected static $primarykey2 = "irr_modulecode";

	public function update($id1,$id2) {
	global $database;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE ".static::$primarykey1." = '". $database->escape_value($id1) ."'";
		$sql .= " AND ".static::$primarykey2." = '". $database->escape_value($id2) ."'";
	  	$database->query($sql);
	  	return ($database->affected_rows() == 1) ? true : false;
	     }

	       	public static function find_by_id($id1=0,$id2=0) {
    	$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE ".static::$primarykey1." = '{$id1}' AND ".static::$primarykey2." = '{$id2}' LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  	}

  	public function delete($id1,$id2) {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  	$sql = "DELETE FROM ".static::$table_name;
	  	$sql .= " WHERE ".static::$primarykey1." = '". $database->escape_value($id1) ."'";
	  	$sql .= " AND ".static::$primarykey2." = '". $database->escape_value($id2) ."'";
	  	$sql .= " LIMIT 1";
	  	$database->query($sql);
	  	return ($database->affected_rows() == 1) ? true : false;

	}

	public static function find_all_by_rolecode($role_code, $ins_code) {
		$sql = "SELECT * FROM ".static::$table_name." WHERE irr_rolecode = '{$role_code}' AND irr_institutecode = '{$ins_code}' AND CONCAT_WS(  '-',  `irr_create` ,  `irr_edit` ,  `irr_delete` ,  `irr_view` ,  `irr_approve` ,  `irr_reject` ,  `irr_cancel` ) LIKE  '%Yes%'";
		return static::find_by_sql($sql);
  	}

  	public static function find_all_by_rolecode_1($role_code, $ins_code) {
		$sql = "SELECT * FROM ".static::$table_name." WHERE irr_rolecode = '{$role_code}' AND irr_institutecode = '{$ins_code}'";
		return static::find_by_sql($sql);
  	}

  	public static function find_by_rolecode_module($role_code, $module_code) {
		$sql = "SELECT * FROM ".static::$table_name." WHERE irr_rolecode = '{$role_code}' AND irr_modulecode = '{$module_code}'";
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
  	}
	
}

?>