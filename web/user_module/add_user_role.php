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
    if(has_presence($_POST['iro_rolename']) && has_presence($_POST['iro_rolecode']) ) {
        $role = new Im_Ur_Role();
        $role->iro_rolecode = $_POST['iro_rolecode'];
        $role->iro_rolename = $_POST['iro_rolename'];
        $role->iro_applicationcode = $_SESSION['user_applicationcode'];
        $role->iro_institutecode = $_SESSION['user_institutecode'];
        $role->iro_createdby = 'admin';
        $role->iro_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($role->create()) {

          // Success
          $session->message("The Role Code {$role->iro_rolecode} Successfully Created.");
          $session->message_type("success");
          redirect_to(BASE.'/user_module/edit_user_role/'.$role->iro_rolecode);
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

<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/user_module/add_user_role.php";?>