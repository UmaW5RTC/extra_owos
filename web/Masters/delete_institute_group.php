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
    $institute = Im_Mr_Instgroup::find_by_id($_GET['primary1']);
    if($institute && $institute->delete($institute->iig_institutegroupcode)) {
      $session->message("The Institute Group {$institute->iig_institutegroupcode} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_institute_group');
    } else {
      $session->message("The Institute Group {$institute->iig_institutegroupcode} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_institute_group');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_institute_group');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>