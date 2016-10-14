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
    $user = Im_Ur_User::find_by_id($_GET['primary1']);
    if($user && $user->destroy($user->ius_userid)) {
      $session->message("The User Profile {$user->ius_userid} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/user_module/view_user_profile');
    } else {
      $session->message("The User Profile {$user->ius_userid} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/user_module/view_user_profile');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/user_module/view_user_profile');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>