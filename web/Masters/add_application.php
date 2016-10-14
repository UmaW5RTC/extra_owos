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
    if(!has_presence($_POST['iap_applicationcode']) || !has_presence($_POST['iap_applicationname']) || !has_presence($_POST['iap_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $application = new Im_Mr_Application();
      $application->iap_applicationcode = $_POST['iap_applicationcode'];
      $application->iap_applicationname = ucfirst($_POST['iap_applicationname']);
      $application->iap_institutecode = ($_POST['iap_institutecode']);
      $application->iap_createdby = 'admin';
      $application->iap_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($application->create()) {
        // Success
        $session->message("Application Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_application');
      } else {
        // Failure
        $message = "Application Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_application.php";?>