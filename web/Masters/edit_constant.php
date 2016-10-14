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
  redirect_to(BASE.'/Masters/view_constant');
}else{
  $sel_constantcode = Im_Mr_Constantcode::find_by_id($_GET['primary1']);
  if(!$sel_constantcode){
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
    if(!has_presence($_POST['ict_constantname']) || !has_presence($_POST['ict_constantcodeprefix']) || !has_presence($_POST['ict_institutecode'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_constantcode->ict_constantname = ucfirst($_POST['ict_constantname']);
        $sel_constantcode->ict_constantcodeprefix=($_POST['ict_constantcodeprefix']);
        $sel_constantcode->ict_institutecode = ($_POST['ict_institutecode']);
        $sel_constantcode->ict_modifiedby = 'admin';
        $sel_constantcode->ict_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_constantcode->update($sel_constantcode->ict_constantcode)) {
            // Success
            $session->message("Constant Code Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_constant');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
        }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_constant.php";?>