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
  redirect_to(BASE.'/Masters/view_timezone');
}else{
  $sel_timezone = Im_Mr_Timezone::find_by_id($_GET['primary1']);
  if(!$sel_timezone){
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
    if(!has_presence($_POST['itz_timezonename']) || !has_presence($_POST['itz_utc']) || !has_presence($_POST['itz_dst'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_timezone->itz_timezonename = $_POST['itz_timezonename'];
        $sel_timezone->itz_utc = $_POST['itz_utc'];
        $sel_timezone->itz_dst = $_POST['itz_dst'];
        $sel_timezone->itz_modifiedby = 'admin';
        $sel_timezone->itz_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_timezone->update($sel_timezone->itz_timezonecode)) {
            // Success
            $session->message("The Timezone {$sel_timezone->itz_timezonecode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_timezone');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_timezone.php";?>