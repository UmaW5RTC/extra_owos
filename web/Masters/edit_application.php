<?php require_once("../private/initialize.php"); ?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
if(empty($_GET['primary1'])) {
  $session->message("No ID was provided.");
  $session->message_type("warning");
  redirect_to(BASE.'/Masters/view_application');
}else{
  $sel_application = Im_Mr_Application::find_by_id($_GET['primary1']);
  if(!$sel_application){
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
    if(!has_presence($_POST['iap_applicationname'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_application->iap_applicationname = ($_POST['iap_applicationname']);
        $sel_application->iap_modifiedby = 'admin';
        $sel_application->iap_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_application->update($sel_application->iap_applicationcode)) {
            // Success
            $session->message("The Application {$sel_application->iap_applicationcode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_application');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_application.php";?>