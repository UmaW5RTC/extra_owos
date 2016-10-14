<?php
require_once("private/initialize.php");

if($session->is_logged_in_as_admin()) {
  $session->message("Already Loged In");
  $session->message_type("warning");
  redirect_to(BASE.'/Dashboard/index');
}
if(request_is_post() && request_is_same_domain()) {

  if(!csrf_token_is_valid() || !csrf_token_is_recent()) {
    $message = "Sorry, request was not valid.";
    $message_type = "danger";
  }
  
  if(!has_presence($_POST['username']) || !has_presence($_POST['password'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
  }else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // Check database to see if username/password exist.
    $found_user = Im_Ur_User::authenticate($username, $password);
    
    if ($found_user) {
      $session->admin_login($found_user);

      $navigation = menu();
      $_SESSION['menu'] = $navigation[0];
      $_SESSION['sub_menu'] = $navigation[1];

      log_action('Login', "{$found_user->ius_username} logged in.");
      $session->message("Login Successfull");
      $session->message_type("success");
      redirect_to(BASE.'/dashboard/index');
    } else {
      // username/password combo was not found in the database
      $message = "Username/password combination incorrect.";
      $message_type = "danger";
    }
  }
}
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/login.php";?>