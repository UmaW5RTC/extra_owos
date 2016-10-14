<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_District extends DatabaseObject {
	
	protected static $table_name="im_mr_district";
	protected static $db_fields = array('idt_districtcode', 'idt_districtname','idt_statecode','idt_countrycode','idt_institutecode','idt_createdby','idt_createddate','idt_modifiedby','idt_modifieddate');
	
	public $idt_districtcode;
	public $idt_districtname;
	public $idt_statecode;
	public $idt_countrycode;
	public $idt_institutecode;
	public $idt_createdby;
	public $idt_createddate;
	public $idt_modifiedby;
	public $idt_modifieddate;

	protected static $primarykey = "idt_districtcode";

	public static function find_all_by_state($state_id=0) {
	    global $database;
	    $sql = "SELECT * FROM " . self::$table_name;
	    $sql .= " WHERE idt_statecode='" .$database->escape_value($state_id) ."'";
	    $sql .= " ORDER BY idt_districtcode ASC";
	    return self::find_by_sql($sql);
	}
	
}

?>