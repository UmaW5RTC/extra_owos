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
    $error = Im_Mr_Error::find_by_id($_GET['primary1']);
    if($error && $error->delete($error->irr_code)) {
      $session->message("The Error {$error->irr_code} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_error_code');
    } else {
      $session->message("The Error {$error->irr_code} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_error_code');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_error_code');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>