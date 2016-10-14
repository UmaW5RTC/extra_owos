<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant (\ for Windows, / for Unix)


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('PROJECT_FOLDER_NAME', 'IMS'.DS.'web');

define('BASE', 'http://localhost'.DS.PROJECT_FOLDER_NAME);

// Set constants to easily reference public and private directories
define("APP_ROOT", dirname(dirname(__FILE__)));
define("PRIVATE_PATH", APP_ROOT . DS . "private");
define("PUBLIC_PATH", APP_ROOT . DS . "public");


define('THEMES_DIR', PUBLIC_PATH . DS . 'themes');
define('THEMES_DIR_LINK', BASE . 'themes');


// licence & expiration date
define('CLIENT_SYSTEM_UUID', '4C4C4544-0044-4210-8046-C4C04F345331');
define('CLIENT_SYSTEM_EXP_DATE', '365');

define("SHOW_EXCEPTIONS", 1);

define('PROJECT_NAME', 'Epanchayat');
define('COMPANY_NAME', 'Teckclouds Technologies ');
define('COMPANY_URL', 'http://www.teckclouds.com');
define("USER_CURRENT_THEME", "elastric");
$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_AUTOCOMMIT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

define("PAGE_PAPER", "A4");
define("PAGE_MARGIN_LEFT", "10");
define("PAGE_MARGIN_RIGHT", "10");
define("PAGE_MARGIN_TOP", "29");
define("PAGE_MARGIN_BOTTOM", "10");
define("PAGE_MARGIN_HEADER", "5");
define("PAGE_MARGIN_FOOTER", "5");
define("PAGE_WATERMARK_TEXT", PROJECT_NAME);
define("PAGE_WATERMARK_ALPHA", "0.1");
define("PAGE_WATERMARK_SHOW", "yes");

define("DATE_FORMAT", "d/m/Y");
define("TIME_FORMAT", "H:i:s");
define("DATE_TIME_FORMAT", "d/m/Y H:i:s");

define("SYSTEM_DATE_FORMAT", "Y-m-d");
define("SYSTEM_TIME_FORMAT", "H:i:s");
define("SYSTEM_DATE_TIME_FORMAT", "Y-m-d H:i:s");

define("LANG_CODE", 'en');
define("LANG_NAME", 'English');

// email related
define("SYSTEM_EMAIL_ID", 'your-email@gmail.com');
define("SYSTEM_EMAIL_PASSWORD", '');
define("SYSTEM_EMAIL_HOST", "smtp.gmail.com");
define("SYSTEM_EMAIL_SENDER_NAME", "Your Name");
define("SYSTEM_PORT_NO", 465);

?>