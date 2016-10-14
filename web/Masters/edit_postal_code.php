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
  redirect_to(BASE.'/Masters/view_postal_code');
}else{
  $sel_po = Im_Mr_Postoffice::find_by_id($_GET['primary1']);
  if(!$sel_po){
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
    if(!has_presence($_POST['ipo_poname']) || !has_presence($_POST['ipo_pincode']) || !has_presence($_POST['ipo_location']) || !has_presence($_POST['ipo_potype'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
    }else{
        $sel_po->ipo_poname = $_POST['ipo_poname'];
        $sel_po->ipo_pincode = $_POST['ipo_pincode'];
        $sel_po->ipo_location = $_POST['ipo_location'];
        $sel_po->ipo_potype = $_POST['ipo_potype'];
        $sel_po->ipo_modifiedby = 'admin';
        $sel_po->ipo_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_po->update($sel_po->ipo_poid)) {
            // Success
            $session->message("The District {$sel_po->ipo_poid} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/Masters/view_postal_code');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      }
    }
  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/Masters/edit_postal_code.php";?>