<?php 
////////////////////////////////////////////////////////////////////////////////////////////////
// &copy; Denis Ojok
// Alpha Code INC
///////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Configuration
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 */

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
date_default_timezone_set('Africa/Kampala');
define('ENVIRONMENT', 'live');

if (ENVIRONMENT == 'live')
{
    error_reporting(E_ALL);
    ini_set("display_errors", 0);
}
elseif(ENVIRONMENT == 'live')
{
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

//
define('URL_PUBLIC_FOLDER', 'static');
define('URL_PROTOCOL', 'https://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
//define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
//
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER."/");
//define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
$config['base_url'] = ''; // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller'] = 'home'; // Default controller to load
$config['error_controller'] = 'page_not_found'; // Controller used for errors (e.g. 404, 500 etc)

$config['db_host'] = 'localhost'; // Database host (e.g. localhost)
$config['db_name'] = 'bugerifg_elibrary'; // Database name
$config['db_username'] = 'bugerifg_elibrary'; // Database username
$config['db_password'] = '!Robot3@'; // Database password

//EMAIL CONFIGURATIONS
define('SYSTEM_EMAIL','no-reply@datatrack.co.ug');
define('SYSTEM_EMAIL_PASSWORD','!Robot@3');
define('SMTP_PORT',587);
define('SMTPSERVER','mail1.jolis.net');

    
// OTHER CONFIGURATIONS
define("UPLOAD_DIR",'data/');
define("rootDirectory","C:");
//

//CUSTOM DEFINITIONS
define('session_name','OpenAccessLibrary');
define('appName','Magic DMS');
?>