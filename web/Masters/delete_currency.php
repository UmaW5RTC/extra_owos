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
    $currency = Im_Mr_Currency::find_by_id($_GET['primary1']);
    if($currency && $currency->delete($currency->icu_currencycode)) {
      $session->message("The Currency {$currency->icu_currencyname} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_currency');
    } else {
      $session->message("The Currency {$currency->icu_currencyname} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_currency');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_currency');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>