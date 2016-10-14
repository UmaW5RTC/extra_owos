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
    $modulegroup = Im_Mr_ModuleGroup::find_by_id($_GET['primary1']);
    if($modulegroup && $modulegroup->delete($modulegroup->imr_modulegroupcode)) {
      $session->message("The Module Group {$modulegroup->imr_modulegroupcode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_modulegroup');
    } else {
      $session->message("The Module Group {$modulegroup->imr_modulegroupcode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_module_group');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_module_group');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>