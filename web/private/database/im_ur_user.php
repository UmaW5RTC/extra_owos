<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Ur_User extends DatabaseObject {
	
	protected static $table_name="im_ur_user";
	protected static $db_fields = array('ius_userid','ius_loginid','ius_emailid','ius_username','ius_password','ius_rolecode','	ius_status','ius_photo','ius_applicationcode','ius_institutecode','ius_createdby','ius_createddate','ius_modifiedby','ius_modifieddate');
	
	public $ius_userid;
	public $ius_loginid;
	public $ius_emailid;
	public $ius_username;
	public $ius_password;
	public $ius_rolecode;
	public $ius_status;
	public $ius_photo;
	public $ius_applicationcode;
	public $ius_institutecode;
	public $ius_createdby;
	public $ius_createddate;
	public $ius_modifiedby;
	public $ius_modifieddate;

	private $temp_path;
  	public $upload_dir="uploads";
  	public $errors=array();

	protected static $primarykey = "ius_userid";

	public static function authenticate($username="", $password="") {
    global $database;
    $username = $database->escape_value($username);
    $password = $database->escape_value($password);
    //$hassed_password = sha1($password);
    $sql  = "SELECT * FROM im_ur_user ";
    $sql .= "WHERE ius_loginid = '{$username}' ";
    $sql .= "AND ius_password = '{$password}' ";
    $sql .= "AND ius_status= 'Active' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}


	protected $upload_errors = array(
		// http://www.php.net/manual/en/features.file-upload.errors.php
		UPLOAD_ERR_OK 			=> "No errors.",
		UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
	  	UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
	  	UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
	  	UPLOAD_ERR_NO_FILE 		=> "No file.",
	  	UPLOAD_ERR_NO_TMP_DIR 	=> "No temporary directory.",
	  	UPLOAD_ERR_CANT_WRITE 	=> "Can't write to disk.",
	  	UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
	);

  // Pass in $_FILE(['uploaded_file']) as an argument
  public function attach_file($file) {
		// Perform error checking on the form parameters
		if(!$file || empty($file) || !is_array($file)) {
		  // error: nothing uploaded or wrong argument usage
		  $this->errors[] = "No file was uploaded.";
		  return false;
		} elseif($file['error'] != 0) {
		  // error: report what PHP says went wrong
		  $this->errors[] = $this->upload_errors[$file['error']];
		  return false;
		} else {
			// Set object attributes to the form parameters.
		  	$this->temp_path  = $file['tmp_name'];
		  	$this->ius_photo  = uniqid().'-'.basename($file['name']);
			// Don't worry about saving anything to the database yet.
			return true;

		}
	}

	private function makeDir(){
		$new_path = PUBLIC_PATH .DS. $this->upload_dir;
		if(!file_exists($new_path)) {
			mkdir($new_path, 0755, true);
		}
		return $new_path;
	}

	public function save() {
		// A new record won't have an id yet.
		if(isset($this->ius_userid)) {
			$target_path = $this->makeDir() .DS. $this->ius_photo;
			// Can't update if there are pre-existing errors
			if(!empty($this->errors)) { return false; }

			// Attempt to move the file 
			move_uploaded_file($this->temp_path, $target_path);

			if($this->update($this->ius_userid)) {
				// We are done with temp_path, the file isn't there anymore
				unset($this->temp_path);
				return true;
			}

		} else {
			// Make sure there are no errors
			
			// Can't save if there are pre-existing errors
		  	if(!empty($this->errors)) { return false; }
			
			// Determine the target_path
		  	$target_path = $this->makeDir() .DS. $this->ius_photo;
		
			// Attempt to move the file 
			move_uploaded_file($this->temp_path, $target_path);
		  	// Success
			// Save a corresponding entry to the database
			if($this->create()) {
				// We are done with temp_path, the file isn't there anymore
				unset($this->temp_path);
				return true;
			}
		}
	}
	
	public function destroy($id) {
		// First remove the database entry
		if($this->delete($id)) {
			// then remove the file
		  // Note that even though the database entry is gone, this object 
			// is still around (which lets us use $this->image_path()).
			$target_path = $this->makeDir() .DS. $this->ius_photo;
			
			unlink($target_path);
			return true;
		} else {
			// database delete failed
			return false;
		}
	}

	public function image_path() {
	  return $this->makeDir() .DS. $this->ius_photo;
	}


}

?>