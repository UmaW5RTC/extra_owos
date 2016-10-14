<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_State extends DatabaseObject {
	
	protected static $table_name="im_mr_state";
	protected static $db_fields = array('ist_statecode', 'ist_statename','ist_countrycode','ist_institutecode','ist_createdby','ist_createddate','ist_modifiedby','ist_modifieddate');
	
	public $ist_statecode;
	public $ist_statename;
	public $ist_countrycode;
	public $ist_institutecode;
	public $ist_createdby;
	public $ist_createddate;
	public $ist_modifiedby;
	public $ist_modifieddate;

	protected static $primarykey = "ist_statecode";

	public static function find_all_by_country($country_id=0) {
	    global $database;
	    $sql = "SELECT * FROM " . self::$table_name;
	    $sql .= " WHERE ist_countrycode='" .$database->escape_value($country_id) ."'";
	    $sql .= " ORDER BY ist_statecode ASC";
	    return self::find_by_sql($sql);
	}

}

?>