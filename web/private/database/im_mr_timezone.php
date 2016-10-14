<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Timezone extends DatabaseObject {
	
	protected static $table_name="im_mr_timezone";
	protected static $db_fields = array('itz_timezonecode', 'itz_timezonename','itz_utc','itz_dst','itz_countrycode','itz_timezoneabbr','itz_institutecode','itz_createdby','itz_createddate','itz_modifiedby','itz_modifieddate');
	
	public $itz_timezonecode;
	public $itz_timezonename;
	public $itz_utc;
	public $itz_dst;
	public $itz_countrycode;
	public $itz_timezoneabbr;
	public $itz_institutecode;
	public $itz_createdby;
	public $itz_createddate;
	public $itz_modifiedby;
	public $itz_modifieddate;

	protected static $primarykey = "itz_timezonecode";

	
}

?>