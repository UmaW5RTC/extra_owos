<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Admin extends DatabaseObject {
	
	protected static $table_name="admin";
	protected static $db_fields = array('id', 'username', 'password');
	
	public $id;
	public $username;
	public $password;
	

	public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);
    $hassed_password = sha1($password);
    $sql  = "SELECT * FROM admin ";
    $sql .= "WHERE username = '{$username}' ";
    $sql .= "AND password = '{$hassed_password}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}

}

?>