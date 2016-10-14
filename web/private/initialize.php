<?php

//from app_top.php
/*
 * inoculate against hack attempts which waste CPU cycles
 */
header('Expires: Sun, 01 Jan 2013 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');

$contaminated = (isset($_FILES['GLOBALS']) || isset($_REQUEST['GLOBALS'])) ? true : false;
$paramsToAvoid = array('GLOBALS', '_COOKIE', '_ENV', '_FILES', '_GET', '_POST', '_REQUEST',
    '_SERVER', '_SESSION', 'HTTP_COOKIE_VARS', 'HTTP_ENV_VARS', 'HTTP_GET_VARS',
    'HTTP_POST_VARS', 'HTTP_POST_FILES', 'HTTP_RAW_POST_DATA', 'HTTP_SERVER_VARS',
    'HTTP_SESSION_VARS');
$paramsToAvoid[] = 'autoLoadConfig';
$paramsToAvoid[] = 'mosConfig_absolute_path';
$paramsToAvoid[] = 'hash';
$paramsToAvoid[] = 'main';
foreach ($paramsToAvoid as $key) {
    if (isset($_GET[$key]) || isset($_POST[$key]) || isset($_COOKIE[$key])) {
        $contaminated = true;
        break;
    }
}
if ($contaminated) {
    header('HTTP/1.1 406 Not Acceptable');
    exit(0);
}
unset($contaminated);
/* * ** END OF INNOCULATION *** */

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING & ~E_STRICT);
date_default_timezone_set('Asia/Kolkata');
ob_start();


//constant files
require_once 'constants.php';
require_once 'database_tables.php';


// load config file first
require_once(PRIVATE_PATH . DS . "config.php");

// load basic functions next so that everything after can use them
require_once(PRIVATE_PATH . DS . "functions" . DS . "general_functions.php");
require_once(PRIVATE_PATH . DS . "functions" . DS . "csrf_request_type_functions.php");
require_once(PRIVATE_PATH . DS . "functions" . DS . "csrf_token_functions.php");
require_once(PRIVATE_PATH . DS . "functions" . DS . "request_forgery_functions.php");
require_once(PRIVATE_PATH . DS . "functions" . DS . "validation_functions.php");
require_once(PRIVATE_PATH . DS . "functions" . DS . "xss_sanitize_functions.php");

// load core objects
require_once(PRIVATE_PATH . DS . "session.php");
require_once(PRIVATE_PATH . DS . "database.php");
require_once(PRIVATE_PATH . DS . "database_object.php");

require_once(PRIVATE_PATH . DS . "pagination.php");

require_once(PRIVATE_PATH.DS."phpMailer".DS."class.phpmailer.php");
require_once(PRIVATE_PATH.DS."phpMailer".DS."class.smtp.php");

//language files

if ($_SESSION["lang_code"] == "" && $_SESSION["lang_name"] == "") {
    $_SESSION["lang_code"] = LANG_CODE;
    $_SESSION["lang_name"] = LANG_NAME;
}

$langFile = PRIVATE_PATH. DS . "languages". DS . $_SESSION["lang_code"]. DS . "index.php";
if (file_exists($langFile)){
    // other langauage
    require_once $langFile;
} else {
    // if that language is not found load english file
    require_once PRIVATE_PATH. DS . "languages/en/index.php";
}
?>