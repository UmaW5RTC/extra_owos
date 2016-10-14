<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Currency extends DatabaseObject {
	
	protected static $table_name="im_mr_currency";
	protected static $db_fields = array('icu_currencycode', 'icu_currencyname','icu_institutecode','icu_createdby','icu_createddate','icu_modifiedby','icu_modifieddate');
	
	public $icu_currencycode;
	public $icu_currencyname;
	public $icu_institutecode;
	public $icu_createdby;
	public $icu_createddate;
	public $icu_modifiedby;
	public $icu_modifieddate;

	protected static $primarykey = "icu_currencycode";
}

?>