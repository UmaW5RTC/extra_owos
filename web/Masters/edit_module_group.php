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
  redirect_to(BASE.'/Masters/view_module_group');
}else{
  $sel_modulegroup = Im_Mr_ModuleGroup::find_by_id($_GET['primary1']);
  if(!$sel_modulegroup){
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
    if(!has_presence($_POST['imr_modulegroupname']) || !has_presence($_POST['imr_modulegroupname_hi']) || !has_presence($_POST['imr_modulegroupname_or'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_modulegroup->imr_modulegroupname = ($_POST['imr_modulegroupname']);
        $sel_modulegroup->imr_modulegroupname_hi = ($_POST['imr_modulegroupname_hi']);
        $sel_modulegroup->imr_modulegroupname_or = ($_POST['imr_modulegroupname_or']);
        $sel_modulegroup->imr_modulegroupiconname = ($_POST['imr_modulegroupiconname']);
        $sel_modulegroup->imr_modulegrouporder = ($_POST['imr_modulegrouporder']);
        $sel_modulegroup->imr_modifiedby = 'admin';
        $sel_modulegroup->imr_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_modulegroup->update($sel_modulegroup->imr_modulegroupcode)) {
            // Success
            $session->message("The Module Group {$sel_modulegroup->imr_modulegroupcode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_module_group');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_module_group.php";?>