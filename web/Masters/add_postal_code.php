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
    if(!has_presence($_POST['ipo_countrycode']) || !has_presence($_POST['statecode']) ||  !has_presence($_POST['districtcode']) || !has_presence($_POST['ipo_poid']) || !has_presence($_POST['ipo_pincode']) || !has_presence($_POST['ipo_poname']) || !has_presence($_POST['ipo_institutecode']) || !has_presence($_POST['ipo_location']) || !has_presence($_POST['ipo_potype']) ) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
      $po = new Im_Mr_Postoffice();
      $po->ipo_countrycode = $_POST['ipo_countrycode'];
      $po->ipo_statecode = $_POST['statecode'];
      $po->ipo_districtcode = $_POST['districtcode'];
      $po->ipo_poid = $_POST['ipo_poid'];
      $po->ipo_pincode = $_POST['ipo_pincode'];
      $po->ipo_poname = $_POST['ipo_poname'];
      $po->ipo_location = $_POST['ipo_location'];
      $po->ipo_potype = $_POST['ipo_potype'];
      $po->ipo_institutecode = $_POST['ipo_institutecode'];
      $po->ipo_createdby = 'admin';
      $po->ipo_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
    if($po->create()) {
        // Success
        $session->message("Post Office Created Successfully.");
        $session->message_type("success");
        redirect_to(BASE.'/Masters/view_postal_code');
      } else {
        // Failure
        $message = "Post Office Could Not Be Created.";
        $message_type = "danger";
      }
    }
  }

?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/add_postal_code.php";?>