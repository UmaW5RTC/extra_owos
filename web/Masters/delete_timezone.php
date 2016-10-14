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
    $timezone = Im_Mr_Timezone::find_by_id($_GET['primary1']);
    if($timezone && $timezone->delete($timezone->itz_timezonecode)) {
      $session->message("The Timezone {$timezone->itz_timezonecode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_timezone');
    } else {
      $session->message("The Timezone {$timezone->itz_timezonecode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_timezone');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_timezone');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>