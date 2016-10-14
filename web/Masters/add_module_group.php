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
    if(!has_presence($_POST['imr_modulegroupcode']) || !has_presence($_POST['imr_modulegroupname']) || !has_presence($_POST['imr_modulegroupname_hi']) || !has_presence($_POST['imr_modulegroupname_or']) || !has_presence($_POST['imr_modulegroupiconname']) || !has_presence($_POST['imr_modulegrouporder']) || !has_presence($_POST['imr_applicationcode']) || !has_presence($_POST['imr_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $modulegroup = new Im_Mr_ModuleGroup();
      $modulegroup->imr_modulegroupcode = $_POST['imr_modulegroupcode'];
      $modulegroup->imr_modulegroupname = ucfirst($_POST['imr_modulegroupname']);
      $modulegroup->imr_modulegroupname_hi = ucfirst($_POST['imr_modulegroupname_hi']);
      $modulegroup->imr_modulegroupname_or = ucfirst($_POST['imr_modulegroupname_or']);
      $modulegroup->imr_modulegroupiconname = $_POST['imr_modulegroupiconname'];
      $modulegroup->imr_modulegrouporder = ucfirst($_POST['imr_modulegrouporder']);
      $modulegroup->imr_applicationcode=($_POST['imr_applicationcode']);
      $modulegroup->imr_institutecode=($_POST['imr_institutecode']);
      $modulegroup->imr_createdby = 'admin';
      $modulegroup->imr_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($modulegroup->create()) {
        // Success
        $session->message("Module Group Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_module_group');
      } else {
        // Failure
        $message = "Module Group Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_module_group.php";?>