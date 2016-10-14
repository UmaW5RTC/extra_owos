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
    $module = Im_Mr_Module::find_by_id($_GET['primary1']);
    if($module && $module->delete($module->imo_modulecode)) {
      $session->message("The Module Group {$module->imo_modulecode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_module');
    } else {
      $session->message("The Module Group {$module->imo_modulecode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_module');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_module');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>