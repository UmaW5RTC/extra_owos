<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Institute extends DatabaseObject {
	
	protected static $table_name="im_mr_institute";
	protected static $db_fields = array('iit_institutecode', 'iit_institutename','iit_createdby','iit_createddate','iit_modifiedby','iit_modifieddate');
	
	public $iit_institutecode;
	public $iit_institutename;
	public $iit_createdby;
	public $iit_createddate;
	public $iit_modifiedby;
	public $iit_modifieddate;

	protected static $primarykey = "iit_institutecode";

	//Other Classes

}

?>