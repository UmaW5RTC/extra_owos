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
    $country = Im_Mr_Country::find_by_id($_GET['primary1']);
    if($country && $country->delete($country->icy_countrycode)) {
      $session->message("The Country {$country->icy_countryname} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_country');
    } else {
      $session->message("The Country {$country->icy_countryname} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_country');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_country');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>