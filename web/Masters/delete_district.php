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
    $district = Im_Mr_District::find_by_id($_GET['primary1']);
    if($district && $district->delete($district->idt_districtcode)) {
      $session->message("The District {$district->idt_districtname} Was Successfully Deleted.");
      $session->message_type("success");
      redirect_to(BASE.'/Masters/view_district');
    } else {
      $session->message("The District {$district->idt_districtname} Could Not Be Deleted.");
      $session->message_type("danger");
      redirect_to(BASE.'/Masters/view_district');
    }
  }else{
    $session->message("Invalid Request");
    $session->message_type("danger");
    redirect_to(BASE.'/Masters/view_district');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>