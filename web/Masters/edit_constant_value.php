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
  redirect_to(BASE.'/Masters/view_constant_value');
}else{
  $sel_constantvalue= Im_Mr_Constantvalue::find_by_id($_GET['primary1']);
  if(!$sel_constantvalue){
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
    if(!has_presence($_POST['icv_constantvalname']) ) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
   
      $sel_constantvalue->icv_constantvalname = ucfirst($_POST['icv_constantvalname']);
      $sel_constantvalue->icv_modifiedby = 'admin';
      $sel_constantvalue->icv_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
      if($sel_constantvalue->update($sel_constantvalue->icv_constantvalcode)) {
        // Success
        $session->message("Constant value Successfully Updated.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_constant_value');
      } else {
        // Failure

        $message = "Nothing to Update";
        $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_constant_value.php";?>