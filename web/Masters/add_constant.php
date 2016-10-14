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
    if(!has_presence($_POST['ict_constantcode']) || !has_presence($_POST['ict_constantname']) || !has_presence($_POST['ict_constantcodeprefix']) || !has_presence($_POST['ict_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $constant_code = new Im_Mr_Constantcode();
      $constant_code->ict_constantcode = ($_POST['ict_constantcode']);
      $constant_code->ict_constantname = ucfirst($_POST['ict_constantname']);
      $constant_code->ict_constantcodeprefix=($_POST['ict_constantcodeprefix']);
      $constant_code->ict_institutecode = ($_POST['ict_institutecode']);
      $constant_code->ict_createdby = 'admin';
      $constant_code->ict_createddate = strftime("%Y-%m-%d %H:%M:%S", time());

      if($constant_code->create()) {
        // Success
        $session->message("Constant Code Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_constant');
      } else {
        // Failure
        $message = "Constant Code Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_constant.php";?>