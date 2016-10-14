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
    if(!has_presence($_POST['ist_countrycode']) || !has_presence($_POST['ist_statecode']) || !has_presence($_POST['ist_statename']) || !has_presence($_POST['ist_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $institute = new Im_Mr_State();
      $institute->ist_countrycode = $_POST['ist_countrycode'];
      $institute->ist_statecode = $_POST['ist_statecode'];
      $institute->ist_statename = ucfirst($_POST['ist_statename']);
      $institute->ist_institutecode=$_POST['ist_institutecode'];
      $institute->ist_createdby = 'admin';
      $institute->ist_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($institute->create()) {
        // Success
        $session->message("State Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_state');
      } else {
        // Failure
        $message = "State Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_state.php";?>