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
  redirect_to(BASE.'/Masters/view_module');
}else{
  $sel_module = Im_Mr_Module::find_by_id($_GET['primary1']);
  if(!$sel_module){
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
    if(!has_presence($_POST['imo_modulename']) || !has_presence($_POST['imo_modulename_hi']) || !has_presence($_POST['imo_modulename_or'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_module->imo_modulename = ($_POST['imo_modulename']);
        $sel_module->imo_modulename_hi = ($_POST['imo_modulename_hi']);
        $sel_module->imo_modulename_or = ($_POST['imo_modulename_or']);
        $sel_module->imo_moduleorder = ($_POST['imo_moduleorder']);
        $sel_module->imo_modifiedby = 'admin';
        $sel_module->imo_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_module->update($sel_module->imo_modulecode)) {
            // Success
            $session->message("The Module Group {$sel_module->imo_modulecode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_module_tab');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_module.php";?>