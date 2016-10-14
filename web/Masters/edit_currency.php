<?php require_once("../private/initialize.php"); ?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to("../login.php");
}
?>
<?php
if(empty($_GET['primary1'])) {
  $session->message("No ID was provided.");
  $session->message_type("warning");
  redirect_to(BASE.'/Masters/view_currency');
}else{
  $sel_currency = Im_Mr_Currency::find_by_id($_GET['primary1']);
  if(!$sel_currency){
    $session->message("Wrong ID");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/index');
  }
}
?>
<?php
  if(request_is_post() && request_is_same_domain()) {

    if(!csrf_token_is_valid() || !csrf_token_is_recent()) {
      $message = "Sorry, request was not valid.";
    }
    if(!has_presence($_POST['icu_currencyname'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_currency->icu_currencyname = ($_POST['icu_currencyname']);
        $sel_currency->icu_modifiedby = 'admin';
        $sel_currency->icu_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_currency->update($sel_currency->icu_currencycode)) {
            // Success
            $session->message("The Currency {$sel_currency->icu_currencycode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_currency');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_currency.php";?>