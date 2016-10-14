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
    $application = Im_Mr_Application::find_by_id($_GET['primary1']);
    if($application && $application->delete($application->iap_applicationcode)) {
      $session->message("The Application {$application->iap_applicationname} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_application');
    } else {
      $session->message("The Application {$application->iap_applicationname} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_application');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_application');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>