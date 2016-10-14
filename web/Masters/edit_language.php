<?php require_once("../private/initialize.php"); ?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
?>
<?php
if(empty($_GET['primary1'])) {
  $session->message("No ID was provided.");
  $session->message_type("warning");
  redirect_to(BASE.'/Masters/view_language');
}else{
  $sel_language = Im_Mr_Language::find_by_id($_GET['primary1']);
  if(!$sel_language){
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
    if(!has_presence($_POST['ilu_languagename'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_language->ilu_languagename = ($_POST['ilu_languagename']);
        $sel_language->ilu_modifiedby = 'admin';
        $sel_language->ilu_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_language->update($sel_language->ilu_languagecode)) {
            // Success
            $session->message("The Language {$sel_language->ilu_languagecode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_language');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_language.php";?>