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
  redirect_to(BASE.'/user_module/view_user_profile');
}else{
  $sel_user = Im_Ur_User::find_by_id($_GET['primary1']);
  if(!$sel_user){
    $session->message("Wrong ID");
    $session->message_type("danger");
    redirect_to(BASE.'/user_module/view_user_profile');
  }
}
?>
<?php
  if(request_is_post() && request_is_same_domain()) {
    if(!csrf_token_is_valid() || !csrf_token_is_recent()) {
      $message = "Sorry, request was not valid.";
    }
    if(has_presence($_POST['ius_emailid']) && has_presence($_POST['ius_username']) &&  has_presence($_POST['ius_password']) && has_presence($_POST['ius_rolecode']) ) {

        $sel_user->ius_emailid = $_POST['ius_emailid'];
        $sel_user->ius_username = $_POST['ius_username'];
        $sel_user->ius_password = $_POST['ius_password'];
        $sel_user->ius_rolecode = $_POST['ius_rolecode'];
        $sel_user->ius_status = $_POST['ius_status'];

        if($_FILES['uploadedimage']['size'] > 0){
          $sel_user->attach_file($_FILES['uploadedimage']);
        }

        $sel_user->ius_modifiedby = 'admin';
        $sel_user->ius_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_user->save()) {
          // Success
          $session->message("The user Profile {$sel_user->ius_userid} Successfully Updated.");
          $session->message_type("success");
          redirect_to(BASE.'/user_module/view_user_profile');
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

<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/user_module/edit_user_profile.php";?>