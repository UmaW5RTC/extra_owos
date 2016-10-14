<?php
// Put all of your general functions in this file

function __autoload($class_name) {
	$class_name = strtolower($class_name);
  $path = PRIVATE_PATH . DS . "database" . DS . "{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
		die("The file {$class_name}.php could not be found.");
	}
}


function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="",$msg_type="") {
  if (!empty($message)) { 
    switch ($msg_type) {

      case "success":
        return '<div class="clearfix"></div><div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>'
                .$message.
              '</div>';
        break;

      case "warning":
        return '<div class="clearfix"></div><div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>'
                .$message.
              '</div>';
        break;

      case "danger":
        return '<div class="clearfix"></div><div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>'
                .$message.
              '</div>';
        break;

      case "info":
        return '<div class="clearfix"></div><div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>'
                .$message.
              '</div>';
        break;

      default:
        return '<div class="alert alert-default alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>'
                .$message.
              '</div>';
        break;
    }
    
  } else {
    return "";
  }
}

function include_layout_template($template="") {
  include ($template);
}

function get_site_url() {
    return APP_ROOT;
}

function get_site_current_theme_url() {
    return BASE.DS ."public".DS."themes".DS.USER_CURRENT_THEME;
}

function log_action($action, $message="") {
	$logfile = APP_ROOT.DS.'logs'.DS.'log.txt';
	$new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')) { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);
    if($new) { chmod($logfile, 0755); }
  } else {
    echo "Could not open log file for writing.";
  }
}

function safe_input($string, $striptags = FALSE, $htmlentities = FALSE,
        $htmlspecial = FALSE) {
    $tempString = "";
    if (is_string($string)) {
        #$tempString = trim(addslashes($string));
        $tempString = trim($string);
        if ($htmlspecial == TRUE) {
            $tempString = trim(htmlspecialchars($string, ENT_QUOTES));
        } if ($htmlentities == TRUE) {
            $tempString = trim(htmlentities($string));
        } if ($striptags == TRUE) {
            $tempString = trim(strip_tags($string));
        }
        return $tempString;
    } elseif (is_array($string)) {
        reset($string);
        while (list($key, $value) = each($string)) {
            $string[$key] = safe_input($value);
        }
        return $string;
    } else {
        return $string;
    }
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime(" %d %B , %Y", $unixdatetime);
}

function datetime_to_text_full($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

function menu(){
  $menu = array();
  $sub_menu = array();
  $role_rights = Im_ur_rolerights::find_all_by_rolecode($_SESSION['user_rolecode'], $_SESSION['user_institutecode']);
  foreach ($role_rights as $role) {
    $module = Im_Mr_Module::find_by_modulecode($role->irr_modulecode, $_SESSION['user_institutecode']);
    $module_group = Im_Mr_ModuleGroup::find_by_modulegroupcode($module->imo_modulegroupcode, $_SESSION['user_institutecode']);

    if (!in_array($module->imo_modulecode, $sub_menu)) {
      array_push($sub_menu, $module->imo_modulecode);
    }

    if (!in_array($module_group->imr_modulegroupcode, $menu)) {
      array_push($menu, $module_group->imr_modulegroupcode);
    }
  }
  return array($menu, $sub_menu);
}

function sidenav($menu, $sub_menu) {
  $page_name = (explode("/",$_SERVER['REQUEST_URI']));

  foreach ($menu as $module_group) {
    $module_group = Im_Mr_ModuleGroup::find_by_modulegroupcode($module_group, $_SESSION['user_institutecode']);
    $module_set = Im_Mr_Module::find_all_by_modulegroupcode($module_group->imr_modulegroupcode, $_SESSION['user_institutecode']);
    if ($module_set) {
      if (str_replace(" ", "_", strtolower($module_group->imr_modulegroupname)) == $page_name[3]) {
        echo '<li class="root-level has-sub active opened">';
      }else{
        echo '<li class="root-level has-sub">';
      }
      
      echo '<a href="#">
              <i class="'.$module_group->imr_modulegroupiconname.'"></i><span>'.$module_group->imr_modulegroupname.'</span>
            </a>';
      foreach ($module_set as $module) {
        if (in_array($module->imo_modulecode, $sub_menu)) {
        echo '<ul class="" style="">
            <li>';
        if (strlen($module->imo_modulepagename) > 0 && $module->imo_modulepagename != "-") {
          echo '<a href="'.$module->imo_modulepagename.'" >';
        }else{
          echo '<a href="'.BASE.DS.str_replace(" ", "_", strtolower($module_group->imr_modulegroupname)).DS.'view_'.str_replace(" ", "_", strtolower($module->imo_modulename)).'" >';
        }

        echo '<i class="'.$module->imo_moduleiconname.'" style="font-size:12px;"></i>
                <span>'.$module->imo_modulename. '</span> 
              </a>
            </li>
        </ul>';
        }
      }
      echo  '</li>';
    }
  }
}
?>


