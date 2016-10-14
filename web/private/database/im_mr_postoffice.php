<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Postoffice extends DatabaseObject {
	
	protected static $table_name="im_mr_postoffice";
	protected static $db_fields = array('ipo_poid', 'ipo_pincode','ipo_poname','ipo_location','ipo_potype','ipo_districtcode','ipo_statecode','ipo_countrycode','ipo_institutecode','ipo_createdby','ipo_createddate','ipo_modifiedby','ipo_modifieddate');
	
	public $ipo_poid;
	public $ipo_pincode;
	public $ipo_poname;
	public $ipo_location;
	public $ipo_potype;
	public $ipo_districtcode;
	public $ipo_statecode;
	public $ipo_countrycode;
	public $ipo_institutecode;
	public $ipo_createdby;
	public $ipo_createddate;
	public $ipo_modifiedby;
	public $ipo_modifieddate;

	protected static $primarykey = "ipo_poid";

	public static function find_all_by_district($district_id=0) {
	    global $database;
	    $sql = "SELECT * FROM " . self::$table_name;
	    $sql .= " WHERE ipo_districtcode='" .$database->escape_value($district_id) ."'";
	    $sql .= " ORDER BY ipo_pincode ASC";
	    return self::find_by_sql($sql);
	}
	
}

?>