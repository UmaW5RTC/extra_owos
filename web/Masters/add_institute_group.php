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
    if(!has_presence($_POST['iig_institutegroupcode']) || !has_presence($_POST['iig_institutegroupname'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $institute = new Im_Mr_Instgroup();
      $institute->iig_institutegroupcode = ($_POST['iig_institutegroupcode']);
      $institute->iig_institutegroupname = ucfirst($_POST['iig_institutegroupname']);
      $institute->iig_createdby = 'admin';
      $institute->iig_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($institute->create()) {
        // Success
        $session->message("Institute Group Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_institute_group');
      } else {
        // Failure
        $message = "Institute Group Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_institute_group.php";?>