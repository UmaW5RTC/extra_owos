<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Geocode extends DatabaseObject {
	
	protected static $table_name="im_mr_geocode";
	protected static $db_fields = array('ige_geocode', 'ige_geocodename', 'ige_countrycode', 'ige_languagecode', 'ige_statecode', 'ige_districtcode', 'ige_region1', 'ige_region2', 'ige_region3', 'ige_region4', 'ige_locality', 'ige_postalcode', 'ige_suburb', 'ige_street', 'ige_range', 'ige_latitude', 'ige_longitude', 'ige_elevation', 'ige_iso2', 'ige_fips', 'ige_nuts', 'ige_hasc', 'ige_stat', 'ige_timezonecode', 'ige_institutecode', 'ige_createdby', 'ige_createddate', 'ige_modifiedby', 'ige_modifieddate');
	
	public $ige_geocode;
	public $ige_geocodename;
	public $ige_countrycode;
	public $ige_languagecode;
	public $ige_statecode;
	public $ige_districtcode;
	public $ige_region1;
	public $ige_region2;
	public $ige_region3;
	public $ige_region4;
	public $ige_locality;
	public $ige_postalcode;
	public $ige_suburb;
	public $ige_street;
	public $ige_range;
	public $ige_latitude;
	public $ige_longitude;
	public $ige_elevation;
	public $ige_iso2;
	public $ige_fips;
	public $ige_nuts;
	public $ige_hasc;
	public $ige_stat;
	public $ige_timezonecode;
	public $ige_institutecode;
	public $ige_createdby;
	public $ige_createddate;
	public $ige_modifiedby;
	public $ige_modifieddate;

	protected static $primarykey = "ige_geocode";

	public static function find_all_by_state($state_id=0) {
	    global $database;
	    $sql = "SELECT * FROM " . self::$table_name;
	    $sql .= " WHERE ige_statecode='" .$database->escape_value($state_id) ."'";
	    $sql .= " ORDER BY ige_geocodename ASC";
	    return self::find_by_sql($sql);
	}
	
}

?>

	