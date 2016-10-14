<?php require_once("../private/initialize.php");?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
?>
<?php
  if(request_is_post() && request_is_same_domain()) {
    if(!csrf_token_is_valid() || !csrf_token_is_recent()) {
      $message = "Sorry, request was not valid.";
    }
    if(has_presence($_POST['ipr_parentprofcode']) && has_presence($_POST['ipr_title']) && has_presence($_POST['ipr_name']) &&  has_presence($_POST['ipr_age']) && has_presence($_POST['ipr_sex']) && has_presence($_POST['ipr_dob']) && has_presence($_POST['ipr_religion']) ) {
        $user = new Im_Ur_Parent();

        if($_FILES['uploadedimage']['size'] > 0){
          $user->attach_file($_FILES['uploadedimage']);
        }

        $user->ipr_institutecode = $_SESSION['user_institutecode'];
        $user->ipr_createdby = 'admin';
        $user->ipr_createddate = strftime("%Y-%m-%d %H:%M:%S", time());

        $user->ipr_parentprofcode = $_POST['ipr_parentprofcode'];
        $user->ipr_title = $_POST['ipr_title'];
        $user->ipr_name = $_POST['ipr_name'];
        $user->ipr_surname = $_POST['ipr_surname'];
        $user->ipr_age = $_POST['ipr_age'];
        $user->ipr_sex = $_POST['ipr_sex'];
        $user->ipr_dob = $_POST['ipr_dob'];
        $user->ipr_religion = $_POST['ipr_religion'];
        $user->ipr_job = $_POST['ipr_job'];
        $user->ipr_resno = $_POST['ipr_resno'];
        $user->ipr_mobile = $_POST['ipr_mobile'];
        $user->ipr_emailid = $_POST['ipr_emailid'];

        $user->ipr_geocode = $_POST['geo'];
        $user->ipr_poid = $_POST['post'];
        $user->ipr_districtcode = $_POST['districtcode'];
        $user->ipr_statecode = $_POST['statecode'];
        $user->ipr_countrycode = $_POST['ipr_countrycode'];

        $user2 = new Im_Ur_User();
        $user2->ius_applicationcode = $_SESSION['user_applicationcode'];
        $user2->ius_institutecode = $_SESSION['user_institutecode'];
        $user2->ius_createdby = 'admin';
        $user2->ius_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
        $user2->ius_rolecode = 'PARENT';
        $user2->save();
        $user->ipr_userid = $database->insert_id();

        $user3 = new Im_Ur_Masteruserprofile();
        $user3->imu_userprofcode = $_POST['ipr_parentprofcode'];
        $user3->imu_usertype = "Parent";
        $user3->imu_institutecode = $_SESSION['user_institutecode'];
        $user3->imu_createdby = 'admin';
        $user3->imu_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
        $user3->create();

        if($user->create2()) {
          // Success
          $session->message("The Parent Profile Successfully Created.");
          $session->message_type("success");
          redirect_to(BASE.'/user_module/view_parent_profile');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      	}
    }else{
      $message = "Missing Field Values.";
      $message_type = "danger";
    }

  }
?>

<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/user_module/add_parent_profile.php";?>