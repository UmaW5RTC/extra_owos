<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Nationality extends DatabaseObject {
	
	protected static $table_name="im_mr_nationality";
	protected static $db_fields = array('ina_nationalitycode', 'ina_nationalityname','ina_institutecode','ina_createdby','ina_createddate','ina_modifiedby','ina_modifieddate');
	
	public $ina_nationalitycode;
	public $ina_nationalityname;
	public $ina_institutecode;
	public $ina_createdby;
	public $ina_createddate;
	public $ina_modifiedby;
	public $ina_modifieddate;

	protected static $primarykey = "ina_nationalitycode";
}

?>