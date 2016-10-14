<?php
require_once("private/initialize.php");

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
      $message_type = "danger";
    }
    if(!has_presence($_POST['old']) || !has_presence($_POST['new'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $admin =Im_Ur_User::find_by_id($_SESSION['user_id']);
      if($admin->ius_password === $_POST['old']){
        $admin->ius_password = $_POST['new'];
        // change password
        if($admin->update($admin->ius_userid)) {
          // Success
          $session->message("Password Successfully Changed.");
          $session->message_type("success");
          redirect_to(BASE.'/change_password');
        } else {
          // Failure
          $message = "Password Could Not Be Changed.";
          $message_type = "danger";
        }
      }else{
        // wromng password
        $message = "Wrong Password! Try Again.";
        $message_type = "danger";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/change_password.php";?>

