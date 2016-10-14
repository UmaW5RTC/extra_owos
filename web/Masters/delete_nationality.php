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
    $nationality = Im_Mr_Nationality::find_by_id($_GET['primary1']);
    if($nationality && $nationality->delete($nationality->ina_nationalitycode)) {
      $session->message("The Nationality {$nationality->ina_nationalityname} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_nationality');
    } else {
      $session->message("The Nationality {$nationality->ina_nationalityname} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_nationality');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_nationality');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>