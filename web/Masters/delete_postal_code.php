<?php require_once("../private/initialize.php"); ?>
<?php
if(!$session->is_logged_in_as_admin()) {
  $session->message("Please LogIn First");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
?>
<?php
  // must have an ID
  if(request_is_get() && request_is_same_domain()) {
    $po = Im_Mr_Postoffice::find_by_id($_GET['primary1']);
    if($po && $po->delete($po->ipo_poid)) {
      $session->message("The Postal Code {$po->ipo_poid} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_postal_code');
    } else {
      $session->message("The Postal Code {$po->ipo_poid} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_postal_code');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_postal_code');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>