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
    if(!has_presence($_POST['irr_code']) || !has_presence($_POST['irr_message']) || !has_presence($_POST['irr_languagecode']) || !has_presence($_POST['irr_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $error = new Im_Mr_Error();
      $error->irr_code = $_POST['irr_code'];
      $error->irr_message = ucfirst($_POST['irr_message']);
      $error->irr_languagecode=$_POST['irr_languagecode'];
      $error->irr_institutecode=$_POST['irr_institutecode'];
      $error->irr_createdby = 'admin';
      $error->irr_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($error->create()) {
        // Success
        $session->message("Error Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_error_code');
      } else {
        // Failure
        $message = "Error Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_error_code.php";?>