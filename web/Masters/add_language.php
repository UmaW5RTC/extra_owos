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
    if(!has_presence($_POST['ilu_languagecode']) || !has_presence($_POST['ilu_languagename']) || !has_presence($_POST['ilu_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $institute = new Im_Mr_Language();
      $institute->ilu_languagecode = $_POST['ilu_languagecode'];
      $institute->ilu_languagename = ucfirst($_POST['ilu_languagename']);
      $institute->ilu_institutecode=($_POST['ilu_institutecode']);
      $institute->ilu_createdby = 'admin';
      $institute->ilu_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($institute->create()) {
        // Success
        $session->message("Language Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_language');
      } else {
        // Failure
        $message = "Language Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_language.php";?>