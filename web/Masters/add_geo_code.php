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
    if(!has_presence($_POST['ige_countrycode']) || !has_presence($_POST['statecode']) ||  !has_presence($_POST['districtcode']) || !has_presence($_POST['ige_geocode']) || !has_presence($_POST['ige_geocodename']) || !has_presence($_POST['ige_region1']) || !has_presence($_POST['ige_institutecode']) || !has_presence($_POST['ige_region2']) || !has_presence($_POST['ige_region3']) || !has_presence($_POST['ige_region4']) || !has_presence($_POST['ige_locality']) || !has_presence($_POST['ige_postalcode']) || !has_presence($_POST['ige_suburb']) || !has_presence($_POST['ige_street']) || !has_presence($_POST['ige_range']) || !has_presence($_POST['ige_latitude']) || !has_presence($_POST['ige_longitude']) || !has_presence($_POST['ige_elevation']) || !has_presence($_POST['ige_iso2']) || !has_presence($_POST['ige_fips']) || !has_presence($_POST['ige_nuts'])  || !has_presence($_POST['ige_hasc']) || !has_presence($_POST['ige_stat']) || !has_presence($_POST['ige_timezonecode']) || !has_presence($_POST['ige_languagecode']) ) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $geo = new Im_Mr_Geocode();
      $geo->ige_countrycode = $_POST['ige_countrycode'];
      $geo->ige_statecode = $_POST['statecode'];
      $geo->ige_districtcode = $_POST['districtcode'];
      $geo->ige_geocode = $_POST['ige_geocode'];
      $geo->ige_geocodename = $_POST['ige_geocodename'];
      $geo->ige_region1 = $_POST['ige_region1'];
      $geo->ige_region2 = $_POST['ige_region2'];
      $geo->ige_region3 = $_POST['ige_region3'];
      $geo->ige_region4 = $_POST['ige_region4'];
      $geo->ige_locality = $_POST['ige_locality'];
      $geo->ige_postalcode = $_POST['ige_postalcode'];
      $geo->ige_suburb = $_POST['ige_suburb'];
      $geo->ige_street = $_POST['ige_street'];
      $geo->ige_range = $_POST['ige_range'];
      $geo->ige_latitude = $_POST['ige_latitude'];
      $geo->ige_longitude = $_POST['ige_longitude'];
      $geo->ige_elevation = $_POST['ige_elevation'];
      $geo->ige_iso2 = $_POST['ige_iso2'];
      $geo->ige_fips = $_POST['ige_fips'];
      $geo->ige_nuts = $_POST['ige_nuts'];
      $geo->ige_hasc = $_POST['ige_hasc'];
      $geo->ige_stat = $_POST['ige_stat'];
      $geo->ige_timezonecode = $_POST['ige_timezonecode'];
      $geo->ige_languagecode = $_POST['ige_languagecode'];
      $geo->ige_institutecode = $_POST['ige_institutecode'];
      $geo->ige_createdby = 'admin';
      $geo->ige_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
    if($geo->create()) {
        // Success
        $session->message("Geo Code Created Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_geo_code');
      } else {
        // Failure
        $message = "Geo Code Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_geo_code.php";?>