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
    if(!has_presence($_POST['ina_nationalitycode']) || !has_presence($_POST['ina_nationalityname']) || !has_presence($_POST['ina_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $institute = new Im_Mr_Nationality();
      $institute->ina_nationalitycode = $_POST['ina_nationalitycode'];
      $institute->ina_nationalityname = ucfirst($_POST['ina_nationalityname']);
      $institute->ina_institutecode=($_POST['ina_institutecode']);
      $institute->ina_createdby = 'admin';
      $institute->ina_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($institute->create()) {
        // Success
        $session->message("Nationality Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_nationality');
      } else {
        // Failure
        $message = "Nationality Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_nationality.php";?>