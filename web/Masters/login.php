<?php
require_once("../private/initialize.php");

if($session->is_logged_in_as_admin()) {
  $session->message("Already LoggedIn");
  $session->message_type("warning");
  redirect_to(BASE.'/login');
}
if(request_is_post() && request_is_same_domain()) {

  if(!csrf_token_is_valid() || !csrf_token_is_recent()) {
    $message = "Sorry, request was not valid.";
    $message_type = "danger";
  }
  
  if(!has_presence($_POST['username']) || !has_presence($_POST['password'])) {
    $message = "Missing Field Values.";
    $message_type = "danger";
  }else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // Check database to see if username/password exist.
    $found_user = Im_Ur_User::authenticate($username, $password);
    
    if ($found_user) {
      $session->admin_login($found_user);
      log_action('Admin Login', "{$found_user->ius_username} logged in.");
      $session->message("Login Successfull");
      $session->message_type("success");
      redirect_to("localhost/IMS/web/Masters/");
    } else {
      // username/password combo was not found in the database
      $message = "Username/password combination incorrect.";
      $message_type = "danger";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>|| LOGIN ||</title>

    <!-- Bootstrap core CSS -->

    <link href="../public/login_details/css/bootstrap.min.css" rel="stylesheet">

    <link href="../public/login_details/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../public/login_details/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../public/login_details/css/custom.css" rel="stylesheet">
    <link href="../public/login_details/css/icheck/flat/green.css" rel="stylesheet">


    <script src="../public/login_details/js/jquery.min.js"></script>
    <script src="../public/login_details/js/bootstrap.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="login.php" method="post" id="form" data-parsley-validate>
                        <?php echo csrf_token_tag(); ?>
                        <h1>Login Form</h1>
                        <?php echo output_message($message, $message_type); ?>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Username" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required />
                        </div>
                        
                        <div>
                            <input id="btn_login" name="login" type="submit" class="btn btn-default btn-block" value="Login" />
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />
                            <div>
                  

                               
                            </div>
                        </div>
                    </form>
                    
                    
                    <!-- form -->
                </section>

                <!-- content -->
            </div>
        </div>
    </div>


<script type="text/javascript" src="../public/login_details/js/parsley/parsley.min.js"></script>
<script>
    $(document).ready(function () {
        $.listen('parsley:field:validate', function () {
            validateFront();
        });
        $('#form .btn').on('click', function () {
            $('#form').parsley().validate();
            validateFront();
        });
        var validateFront = function () {
            if (true === $('#form').parsley().isValid()) {
                $('.bs-callout-info').removeClass('hidden');
                $('.bs-callout-warning').addClass('hidden');
            } else {
                $('.bs-callout-info').addClass('hidden');
                $('.bs-callout-warning').removeClass('hidden');
            }
        };
    });
    try {
        hljs.initHighlightingOnLoad();
    } catch (err) {}
</script>

</body>

</html>