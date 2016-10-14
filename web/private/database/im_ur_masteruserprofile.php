<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Ur_Masteruserprofile extends DatabaseObject {
	
	protected static $table_name="im_ur_masteruserprofile";
	protected static $db_fields = array('imu_userprofcode', 'imu_usertype', 'imu_institutecode', 'imu_createdby','imu_createddate','imu_modifiedby','imu_modifieddate');
	
	public $imu_userprofcode;
	public $imu_usertype;
	public $imu_institutecode;

	public $imu_createdby;
	public $imu_createddate;
	public $imu_modifiedby;
	public $imu_modifieddate;

	protected static $primarykey = "imu_userprofcode";
	
}

?>