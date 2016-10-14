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
    $geo = Im_Mr_Geocode::find_by_id($_GET['primary1']);
    if($geo && $geo->delete($geo->ige_geocode)) {
      $session->message("The Geo Code {$geo->ige_geocode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_geo_code');
    } else {
      $session->message("The Geo Code {$geo->ige_geocode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_geo_code');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_geo_code');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>