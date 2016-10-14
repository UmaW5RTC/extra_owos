<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Mr_Instgroup extends DatabaseObject {
	
	protected static $table_name="im_mr_instgroup";
	protected static $db_fields = array('iig_institutegroupcode', 'iig_institutegroupname','iig_createdby','iig_createddate','iig_modifiedby','iig_modifieddate');
	
	public $iig_institutegroupcode;
	public $iig_institutegroupname;
	public $iig_createdby;
	public $iig_createddate;
	public $iig_modifiedby;
	public $iig_modifieddate;

	protected static $primarykey = "iig_institutegroupcode";
	
}

?>