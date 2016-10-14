<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Neon Admin Panel">
  <meta name="author" content="">
<title>login page</title>


  <style>.file-input-wrapper { overflow: hidden; position: relative; cursor: pointer; z-index: 1; }.file-input-wrapper input[type=file], .file-input-wrapper input[type=file]:focus, .file-input-wrapper input[type=file]:hover { position: absolute; top: 0; left: 0; cursor: pointer; opacity: 0; filter: alpha(opacity=0); z-index: 99; outline: 0; }.file-input-name { margin-left: 8px; }</style>

    <link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/login-page-styles.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/disha-core.css">
  <link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/disha-theme.css">
  <link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/disha-forms.css">
  <link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/custom.css">
    

    <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-1.11.2.min.js"></script>

<script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-edwidgets.js"></script>
<script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-ui-1.11.4.min.js"></script>
<script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-upl-blockUI.js"></script>
<script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-upl-colResizable-1.5.min.js"></script>
<style type="text/css">  .JColResizer{table-layout:fixed;} .JColResizer td, .JColResizer th{overflow:hidden;padding-left:0!important; padding-right:0!important;}  .JCLRgrips{ height:0px; position:relative;} .JCLRgrip{margin-left:-5px; position:absolute; z-index:5; } .JCLRgrip .JColResizer{position:absolute;background-color:red;filter:alpha(opacity=1);opacity:0;width:10px;height:100%;cursor: e-resize;top:0px} .JCLRLastGrip{position:absolute; width:1px; } .JCLRgripDrag{ border-left:1px dotted black;  } .JCLRFlex{width:auto!important;}</style>
<script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-upl-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery-upl-easing.1.3.js"></script>
<link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/colorpicker.css">
<link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/edwidgets.css">
<link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/jquery-ui-timepicker-addon.css">
<link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/jquery-ui.min.css">
<link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/theme.css">
<link rel="stylesheet" href="<?php echo get_site_current_theme_url(); ?>/css/entypo.css">

</head>

<body>
<!-- This is needed when you send requests via Ajax --><script type="text/javascript">
var baseurl = '';
</script>
<div id="container"  class="width">
  
    <div id="intro">

  <div class="width">
      
    <div class="intro-content intro-content-short">
        <img src="<?php echo get_site_current_theme_url(); ?>/images/client-big-logo.png"/>
     <h2>Institute of Digital Media Technology</h2>
        </div>
     </div>
            

    </div>

    <div id="body" class="width">

  <section id="content" class="two-column with-right-sidebar">

      <article>
      
      <h2>Examples</h2>

            <h1>Heading H1</h1>
            <h2>Heading H2</h2>
             <p>&nbsp;</p>          
    </article>
        </section>
        
        <aside class="sidebar big-sidebar right-sidebar">
  
  <div class="login-content">

         <div class="form-login-error">
              <h3>Login form</h3>
             <?php echo output_message($message, $message_type); ?>
            </div>
       <form action="login.php" method="post" id="form" data-parsley-validate>
        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-user"></i>
            </div>

            <input class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" type="text">
          </div>

        </div>

        <div class="form-group">

          <div class="input-group">
            <div class="input-group-addon">
              <i class="entypo-key"></i>
            </div>

            <input class="form-control" name="password" placeholder="Password" autocomplete="off" type="password">
          </div>

        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-login" name="login" value="Login">
            <i class="entypo-login"></i>
            Submit
          </button>
        </div>

      </form>


      </div>
              
    
        </aside>
      
        
    </div>
    
</div>
    <div  class="clear"></div>
  <div style=" height:40px;"></div>
  
<div id="footer-wrapper">
<div id="footer-text">
    <a href="#" target="_blank">Disha</a> is licensed by <a href="http://www.idmt.in/" target="_blank">Institute of Digital Media Technology</a> (2004 - 2016).</div>
</div>

</body>
</html>

<?php include('layouts/app_bottom.php'); ?>