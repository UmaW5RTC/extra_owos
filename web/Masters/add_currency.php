<?php require_once("../private/initialize.php"); ?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
?>
<?php
  if(request_is_post() && request_is_same_domain()) {

    if(!csrf_token_is_valid() || !csrf_token_is_recent()) {
      $message = "Sorry, request was not valid.";
    }
    if(!has_presence($_POST['icu_currencycode']) || !has_presence($_POST['icu_currencyname']) || !has_presence($_POST['icu_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $institute = new Im_Mr_Currency();
      $institute->icu_currencycode = $_POST['icu_currencycode'];
      $institute->icu_currencyname = ucfirst($_POST['icu_currencyname']);
      $institute->icu_institutecode=($_POST['icu_institutecode']);
      $institute->icu_createdby = 'admin';
      $institute->icu_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($institute->create()) {
        // Success
        $session->message("Currency Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_currency');
      } else {
        // Failure
        $message = "Currency Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_currency.php";?>