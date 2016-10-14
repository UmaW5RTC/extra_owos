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
      $message = REQUEST_NOT_VALID;
    }
    if(!has_presence($_POST['iit_institutecode']) || !has_presence($_POST['iit_institutename'])) {
    $message = MISSING_FIELDS;
    $message_type = "danger";
    }else{
      $institute = new Im_Mr_Institute();
      $institute->iit_institutecode = ($_POST['iit_institutecode']);
      $institute->iit_institutename = ucfirst($_POST['iit_institutename']);
      $institute->iit_createdby = 'admin';
      $institute->iit_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
 
      if($institute->create()) {
        // Success
        $session->message(CREATED_SUCCESS);
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_institute');
      } else {
        // Failure
        $message = CREATED_FAIl;
        $message_type = "danger";
      }
    }
  }

?>

<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_institute.php";?>