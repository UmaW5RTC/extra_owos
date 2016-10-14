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
    $state = Im_Mr_State::find_by_id($_GET['primary1']);
    if($state && $state->delete($state->ist_statecode)) {
      $session->message("The State {$state->ist_statename} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_state');
    } else {
      $session->message("The State {$state->ist_statename} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_state');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_state');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>