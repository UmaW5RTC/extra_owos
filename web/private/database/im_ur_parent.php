<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(PRIVATE_PATH . DS . 'database.php');

class Im_Ur_Parent extends DatabaseObject {
	
	protected static $table_name="im_ur_parent";
	protected static $db_fields = array('ipr_parentprofcode','ipr_userid','ipr_title','ipr_name','ipr_surname','ipr_age','ipr_sex','ipr_dob','ipr_religion','ipr_job','ipr_geocode','	ipr_resno','ipr_mobile','ipr_emailid','ipr_address','ipr_poid','ipr_districtcode','ipr_statecode','ipr_countrycode','ipr_photo','ipr_lmembertypecode','ipr_institutecode','ipr_createdby','ipr_createddate','ipr_modifiedby','ipr_modifieddate');
	
	public $ipr_parentprofcode;
	public $ipr_userid;
	public $ipr_title;
	public $ipr_name;
	public $ipr_surname;
	public $ipr_age;
	public $ipr_sex;
	public $ipr_dob;
	public $ipr_religion;
	public $ipr_job;
	public $ipr_geocode;
	public $ipr_resno;
	public $ipr_mobile;
	public $ipr_emailid;
	public $ipr_poid;
	public $ipr_districtcode;
	public $ipr_statecode;
	public $ipr_countrycode;
	public $ipr_photo;
	public $ipr_lmembertypecode;
	public $ipr_institutecode;
	public $ipr_createdby;
	public $ipr_createddate;
	public $ipr_modifiedby;
	public $ipr_modifieddate;

	private $temp_path;
  	public $upload_dir="uploads";
  	public $errors=array();

	protected static $primarykey = "ipr_parentprofcode";


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
		  	$this->ipr_photo  = uniqid().'-'.basename($file['name']);
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

	public function update2() {
		$target_path = $this->makeDir() .DS. $this->ipr_photo;

		// Attempt to move the file 
		move_uploaded_file($this->temp_path, $target_path);

		if($this->update($this->ipr_parentprofcode)) {
			// We are done with temp_path, the file isn't there anymore
			unset($this->temp_path);
			return true;
		}
	}

	public function create2() {
	  	$target_path = $this->makeDir() .DS. $this->ipr_photo;

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
	
	public function destroy($id) {
		// First remove the database entry
		if($this->delete($id)) {
			// then remove the file
		  // Note that even though the database entry is gone, this object 
			// is still around (which lets us use $this->image_path()).
			$target_path = $this->makeDir() .DS. $this->ipr_photo;
			
			unlink($target_path);
			return true;
		} else {
			// database delete failed
			return false;
		}
	}

	public function image_path() {
	  return $this->makeDir() .DS. $this->ipr_photo;
	}


}

?>