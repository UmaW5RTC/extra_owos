<?php require_once("../private/initialize.php");?>
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
    if(has_presence($_POST['ius_loginid']) && has_presence($_POST['ius_emailid']) && has_presence($_POST['ius_username']) &&  has_presence($_POST['ius_password']) && has_presence($_POST['ius_rolecode']) ) {
        $user = new Im_Ur_User();
        $user->ius_loginid = $_POST['ius_loginid'];
        $user->ius_emailid = $_POST['ius_emailid'];
        $user->ius_username = $_POST['ius_username'];
        $user->ius_password = $_POST['ius_password'];
        $user->ius_rolecode = $_POST['ius_rolecode'];
        $user->ius_status = $_POST['ius_status'];

        if($_FILES['uploadedimage']['size'] > 0){
          $user->attach_file($_FILES['uploadedimage']);
        }

        $user->ius_applicationcode = $_SESSION['user_applicationcode'];
        $user->ius_institutecode = $_SESSION['user_institutecode'];
        $user->ius_createdby = 'admin';
        $user->ius_createddate = strftime("%Y-%m-%d %H:%M:%S", time());
      
        if($user->save()) {
          // Success
          $session->message("The user Profile {$user->ius_userid} Successfully Created.");
          $session->message_type("success");
          redirect_to(BASE.'/user_module/view_user_profile');
        } else {
            // Failure
            $message = "Nothing to Update";
            $message_type = "warning";
      	}
    }else{
      $message = "Missing Field Values.";
      $message_type = "danger";
    }

  }
?>

<?php require_once THEMES_DIR .'/'. USER_CURRENT_THEME . "/user_module/add_user_profile.php";?>