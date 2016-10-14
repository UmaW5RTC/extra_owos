<?php require_once("../private/initialize.php"); ?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
?>
<?php
  // must have an ID
  if(request_is_get() && request_is_same_domain()) {
    $role = Im_Ur_Role::find_by_id($_GET['primary1']);
    if($role && $role->delete($role->iro_rolecode)) {
      $session->message("The Constant Code {$role->iro_rolecode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/user_module/view_user_role');
    } else {
      $session->message("The Constant Code {$role->iro_rolecode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/user_module/view_user_role');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/user_module/view_user_role');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>