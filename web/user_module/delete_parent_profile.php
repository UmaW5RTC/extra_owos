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
    $parent = Im_Ur_Parent::find_by_id($_GET['primary1']);
    $user = Im_Ur_User::find_by_id($parent->ipr_userid);
    $master = Im_Ur_Masteruserprofile::find_by_id($parent->ipr_parentprofcode);

    if($parent) {
      
      $parent->delete($parent->ipr_parentprofcode);
      $master->delete($master->imu_userprofcode);
      $user->delete($user->ius_userid);

      $session->message("The User Profile {$parent->ipr_parentprofcode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/user_module/view_parent_profile');
    } else {
      $session->message("The User Profile {$parent->ipr_parentprofcode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/user_module/view_parent_profile');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/user_module/view_parent_profile');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>