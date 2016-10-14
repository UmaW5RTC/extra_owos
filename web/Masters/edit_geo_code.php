<?php require_once("../private/initialize.php"); ?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
if(empty($_GET['primary1'])) {
  $session->message("No ID was provided.");
  $session->message_type("warning");
  redirect_to(BASE.'/Masters/view_postal_code');
}else{
  $sel_geo = Im_Mr_Geocode::find_by_id($_GET['primary1']);
  if(!$sel_geo){
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
    if(!has_presence($_POST['ige_geocodename']) || !has_presence($_POST['ige_region1']) || !has_presence($_POST['ige_region2']) || !has_presence($_POST['ige_region3']) || !has_presence($_POST['ige_region4']) || !has_presence($_POST['ige_locality']) ||  !has_presence($_POST['ige_suburb']) || !has_presence($_POST['ige_street']) || !has_presence($_POST['ige_range']) || !has_presence($_POST['ige_latitude']) || !has_presence($_POST['ige_longitude']) || !has_presence($_POST['ige_elevation']) || !has_presence($_POST['ige_iso2']) || !has_presence($_POST['ige_fips']) || !has_presence($_POST['ige_nuts'])  || !has_presence($_POST['ige_hasc']) || !has_presence($_POST['ige_stat']) ) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_geo->ige_geocodename = $_POST['ige_geocodename'];
        $sel_geo->ige_region1 = $_POST['ige_region1'];
        $sel_geo->ige_region2 = $_POST['ige_region2'];
        $sel_geo->ige_region3 = $_POST['ige_region3'];
        $sel_geo->ige_region4 = $_POST['ige_region4'];
        $sel_geo->ige_locality = $_POST['ige_locality'];
        $sel_geo->ige_suburb = $_POST['ige_suburb'];
        $sel_geo->ige_street = $_POST['ige_street'];
        $sel_geo->ige_range = $_POST['ige_range'];
        $sel_geo->ige_latitude = $_POST['ige_latitude'];
        $sel_geo->ige_longitude = $_POST['ige_longitude'];
        $sel_geo->ige_elevation = $_POST['ige_elevation'];
        $sel_geo->ige_iso2 = $_POST['ige_iso2'];
        $sel_geo->ige_fips = $_POST['ige_fips'];
        $sel_geo->ige_nuts = $_POST['ige_nuts'];
        $sel_geo->ige_hasc = $_POST['ige_hasc'];
        $sel_geo->ige_stat = $_POST['ige_stat'];
        $sel_geo->ige_modifiedby = 'admin';
        $sel_geo->ige_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_geo->update($sel_geo->ige_geocode)) {
            // Success
            $session->message("The Geo Code {$sel_geo->ige_geocode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_geo_code');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_geo_code.php";?>