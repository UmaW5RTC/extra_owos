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
    $constantvalue = Im_Mr_Constantvalue::find_by_id($_GET['primary1']);
    if($constantvalue && $constantvalue->delete($constantvalue->icv_constantvalcode)) {
      $session->message("The Constant value {$constantvalue->icv_constantvalcode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_constant_value');
    } else {
      $session->message("The Constant value {$constantvalue->icv_constantvalcode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_constant_value');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_constant_value');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>
