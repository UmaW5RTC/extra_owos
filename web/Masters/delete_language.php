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
    $language = Im_Mr_Language::find_by_id($_GET['primary1']);
    if($language && $language->delete($language->ilu_languagecode)) {
      $session->message("The Language {$language->ilu_languagename} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_language');
    } else {
      $session->message("The Language {$language->ilu_languagename} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_language');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_language');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>