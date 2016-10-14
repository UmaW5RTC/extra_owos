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
    $institute = Im_Mr_Institute::find_by_id($_GET['primary1']);
    if($institute && $institute->delete($institute->iit_institutecode)) {
      $session->message("The Institute {$institute->iit_institutecode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_institute');
    } else {
      $session->message("The Institute {$institute->iit_institutecode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_institute');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_institute');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>