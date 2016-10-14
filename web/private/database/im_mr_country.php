<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Country extends DatabaseObject {
	
	protected static $table_name="im_mr_country";
	protected static $db_fields = array('icy_countrycode', 'icy_countryname','icy_institutecode','icy_createdby','icy_createddate','icy_modifiedby','icy_modifieddate');
	
	public $icy_countrycode;
	public $icy_countryname;
	public $icy_institutecode;
	public $icy_createdby;
	public $icy_createddate;
	public $icy_modifiedby;
	public $icy_modifieddate;

	protected static $primarykey = "icy_countrycode";
}

?>