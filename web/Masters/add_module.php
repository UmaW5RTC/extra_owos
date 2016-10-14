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
    if(!has_presence($_POST['imo_modulegroupcode']) || !has_presence($_POST['imo_modulecode']) || !has_presence($_POST['imo_modulepagename']) || !has_presence($_POST['imo_modulename']) || !has_presence($_POST['imo_modulename_hi']) || !has_presence($_POST['imo_modulename_or']) || !has_presence($_POST['imo_moduleorder']) || !has_presence($_POST['imo_applicationcode']) || !has_presence($_POST['imo_institutecode']) || !has_presence($_POST['imo_modulestatus'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $module = new Im_Mr_Module();
      $module->imo_modulegroupcode = $_POST['imo_modulegroupcode'];
      $module->imo_modulecode = $_POST['imo_modulecode'];
      $module->imo_moduleiconname = $_POST['imo_moduleiconname'];
      $module->imo_modulepagename = $_POST['imo_modulepagename'];
      $module->imo_modulename = ucfirst($_POST['imo_modulename']);
      $module->imo_modulename_hi = ucfirst($_POST['imo_modulename_hi']);
      $module->imo_modulename_or = ucfirst($_POST['imo_modulename_or']);
      $module->imo_moduleorder = ucfirst($_POST['imo_moduleorder']);
      $module->imo_applicationcode = $_POST['imo_applicationcode'];
      $module->imo_institutecode = $_POST['imo_institutecode'];
      $module->imo_modulestatus = $_POST['imo_modulestatus'];
      $module->imo_createdby = 'admin';
      $module->imo_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($module->create()) {
        // Success
        $session->message("Module Group Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_module');
      } else {
        // Failure
        $message = "Module Group Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_module.php";?>