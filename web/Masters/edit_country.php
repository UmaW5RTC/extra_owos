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
  redirect_to(BASE.'/Masters/view_country');
}else{
  $sel_country = Im_Mr_Country::find_by_id($_GET['primary1']);
  if(!$sel_country){
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
    if(!has_presence($_POST['icy_countryname'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_country->icy_countryname = ($_POST['icy_countryname']);
        $sel_country->icy_modifiedby = 'admin';
        $sel_country->icy_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_country->update($sel_country->icy_countrycode)) {
            // Success
            $session->message("The Country {$sel_country->icy_countrycode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_country');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_country.php";?>