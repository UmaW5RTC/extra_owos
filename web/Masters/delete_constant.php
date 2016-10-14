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
    $constantcode = Im_Mr_Constantcode::find_by_id($_GET['primary1']);
    if($constantcode && $constantcode->delete($constantcode->ict_constantcode)) {
      $session->message("The Constant Code {$constantcode->ict_constantcode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_constant');
    } else {
      $session->message("The Constant Code {$constantcode->ict_constantcode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_constant');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_constant');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>