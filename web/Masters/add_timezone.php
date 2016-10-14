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
    if(!has_presence($_POST['itz_countrycode']) || !has_presence($_POST['itz_timezonecode']) || !has_presence($_POST['itz_timezonename']) || !has_presence($_POST['itz_institutecode']) || !has_presence($_POST['itz_utc']) || !has_presence($_POST['itz_dst']) || !has_presence($_POST['itz_timezoneabbr'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $timezone = new Im_Mr_Timezone();
      $timezone->itz_countrycode = $_POST['itz_countrycode'];
      $timezone->itz_timezonecode = $_POST['itz_timezonecode'];
      $timezone->itz_timezonename = $_POST['itz_timezonename'];
      $timezone->itz_utc = $_POST['itz_utc'];
      $timezone->itz_dst = $_POST['itz_dst'];
      $timezone->itz_timezoneabbr = $_POST['itz_timezoneabbr'];
      $timezone->itz_institutecode = $_POST['itz_institutecode'];
      $timezone->itz_createdby = 'admin';
      $timezone->itz_createddate = strftime("%Y-%m-%d %H:%M:%S", time());

      if($timezone->create()) {
        // Success
        $session->message("Timezone Created  Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_timezone');
      } else {
        // Failure
        $message = "Timezone Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_timezone.php";?>