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
    if(!has_presence($_POST['icv_constantvalcode']) || !has_presence($_POST['icv_constantvalname']) || !has_presence($_POST['icv_constantcode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $constant_value = new Im_Mr_Constantvalue();
      $constant_value->icv_constantvalcode = $_POST['icv_constantvalcode'];
      $constant_value->icv_constantvalname = $_POST['icv_constantvalname'];
      $constant_value->icv_constantcode= $_POST['icv_constantcode'];

      $institute = Im_Mr_Constantcode::find_INS_by_constantvalcode($_POST['icv_constantcode']);

      $constant_value->icv_institutecode = $institute->ict_institutecode;
      $constant_value->icv_createdby = 'admin';
      $constant_value->icv_createddate = strftime("%Y-%m-%d %H:%M:%S", time());

      if($constant_value->create()) {
        // Success
        $session->message("Constant Value Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_constant_value');
      } else {
        // Failure
        $message = "Constant Value Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_constant_value.php";?>