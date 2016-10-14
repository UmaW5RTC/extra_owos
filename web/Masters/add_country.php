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
    if(!has_presence($_POST['icy_countrycode']) || !has_presence($_POST['icy_countryname']) || !has_presence($_POST['icy_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $institute = new Im_Mr_Country();
      $institute->icy_countrycode = $_POST['icy_countrycode'];
      $institute->icy_countryname = ucfirst($_POST['icy_countryname']);
      $institute->icy_institutecode=($_POST['icy_institutecode']);
      $institute->icy_createdby = 'admin';
      $institute->icy_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($institute->create()) {
        // Success
        $session->message("Country Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_country');
      } else {
        // Failure
        $message = "Country Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_country.php";?>