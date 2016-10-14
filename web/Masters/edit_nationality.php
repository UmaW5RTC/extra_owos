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
  redirect_to(BASE.'/Masters/view_nationality');
}else{
  $sel_nationality = Im_Mr_Nationality::find_by_id($_GET['primary1']);
  if(!$sel_nationality){
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
    if(!has_presence($_POST['ina_nationalityname'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_nationality->ina_nationalityname = ($_POST['ina_nationalityname']);
        $sel_nationality->ina_modifiedby = 'admin';
        $sel_nationality->ina_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_nationality->update($sel_nationality->ina_nationalitycode)) {
            // Success
            $session->message("The Nationality {$sel_nationality->ina_nationalitycode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_nationality');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_nationality.php";?>