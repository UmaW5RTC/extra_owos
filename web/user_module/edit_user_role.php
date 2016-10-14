<?php require_once("../private/initialize.php");?>
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
  redirect_to(BASE.'/user_module/view_user_role');
}else{
  $sel_role = Im_Ur_Role::find_by_id($_GET['primary1']);
  if(!$sel_role){
    $session->message("Wrong ID");
    $session->message_type("danger");
    redirect_to(BASE.'/user_module/view_user_role');
  }
}
?>
<?php
  if(request_is_post() && request_is_same_domain()) {

    if(has_presence($_POST['iro_rolename']) && has_presence($_POST['submit']) ) {
        $sel_role->iro_rolename = ($_POST['iro_rolename']);
        $sel_role->ist_modifiedby = 'admin';
        $sel_role->ist_modifieddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($sel_role->update($sel_role->iro_rolecode)) {
            // Success
            $session->message("The Role Code {$sel_role->iro_rolecode} Successfully Updated.");
            $session->message_type("success");
            redirect_to(BASE.'/user_module/view_user_role');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      	}
    }

    if(has_presence($_POST['submit2']) ) {
        foreach ($_POST["modules"] as $module) {
	        $mod = safe_input(($module));
	        $create = (safe_input($_POST["create_" . $mod]) == "yes") ? "yes" : "no";
	        $edit = (safe_input($_POST["edit_" . $mod]) == "yes") ? "yes" : "no";
	        $delete = (safe_input($_POST["delete_" . $mod]) == "yes") ? "yes" : "no";
	        $view = (safe_input($_POST["view_" . $mod]) == "yes") ? "yes" : "no";

	        $sel_role_right = Im_Ur_Rolerights::find_by_rolecode_module($_GET['primary1'], $mod);
	        $sel_role_right->irr_create = $create;
    			$sel_role_right->irr_edit = $edit;
    			$sel_role_right->irr_delete = $delete;
    			$sel_role_right->irr_view = $view;
    			$sel_role_right->update($sel_role_right->irr_rolecode, $mod);
        }
       	// Success
        $session->message("The Role Rights {$sel_role_right->irr_rolecode} Successfully Updated.");
        $session->message_type("success");
        redirect_to(BASE.'/user_module/view_user_role');
    }

  }
?>
<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/user_module/edit_user_role.php";?>