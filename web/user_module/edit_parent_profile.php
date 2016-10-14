<?php require_once("../private/initialize.php");?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
?>
<?php
if(empty($_GET['primary1'])) {
  $session->message("No ID was provided.");
  $session->message_type("warning");
  redirect_to(BASE.'/user_module/view_user_role');
}else{
  $sel_user = Im_Ur_Parent::find_by_id($_GET['primary1']);
  if(!$sel_user){
    $session->message("Wrong ID");
    $session->message_type("danger");
    redirect_to(BASE.'/user_module/view_user_role');
  }
}
?>
<?php
  if(request_is_post() && request_is_same_domain()) {
    if(!csrf_token_is_valid() || !csrf_token_is_recent()) {
      $message = "Sorry, request was not valid.";
    }
    if(has_presence($_POST['ipr_parentprofcode']) && has_presence($_POST['ipr_title']) && has_presence($_POST['ipr_name']) &&  has_presence($_POST['ipr_age']) && has_presence($_POST['ipr_sex']) && has_presence($_POST['ipr_dob']) && has_presence($_POST['ipr_religion']) ) {

        if($_FILES['uploadedimage']['size'] > 0){
          $sel_user->attach_file($_FILES['uploadedimage']);
        }

        $sel_user->ipr_institutecode = $_SESSION['user_institutecode'];
        $sel_user->ipr_createdby = 'admin';
        $sel_user->ipr_createddate = strftime("%Y-%m-%d %H:%M:%S", time());

        $sel_user->ipr_parentprofcode = $_POST['ipr_parentprofcode'];
        $sel_user->ipr_title = $_POST['ipr_title'];
        $sel_user->ipr_name = $_POST['ipr_name'];
        $sel_user->ipr_surname = $_POST['ipr_surname'];
        $sel_user->ipr_age = $_POST['ipr_age'];
        $sel_user->ipr_sex = $_POST['ipr_sex'];
        $sel_user->ipr_dob = $_POST['ipr_dob'];
        $sel_user->ipr_religion = $_POST['ipr_religion'];
        $sel_user->ipr_job = $_POST['ipr_job'];
        $sel_user->ipr_resno = $_POST['ipr_resno'];
        $sel_user->ipr_mobile = $_POST['ipr_mobile'];
        $sel_user->ipr_emailid = $_POST['ipr_emailid'];

        $sel_user->ipr_geocode = $_POST['geo'];
        $sel_user->ipr_poid = $_POST['post'];
        $sel_user->ipr_districtcode = $_POST['districtcode'];
        $sel_user->ipr_statecode = $_POST['statecode'];
        $sel_user->ipr_countrycode = $_POST['ipr_countrycode'];

        if($sel_user->update2()) {
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

<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/user_module/edit_parent_profile.php";?>