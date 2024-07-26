<?php
try{
if(! file_exists("data.php")){
    header('Location: generate/');
    exit;
}
// Define application paths
// Please don't change value below.
$front_end_path = 'Front_End/';
$back_end_path = 'Back_End/';

/** 
 * 
 * @package	CodeIgniter
 * @author	Tyrone Lee Emz
 * @author name: Tyrone Limen Malocon
 * @copyright	Copyright (c) 2024 - Tyrone Lee Emz
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 * 
*/

// Set the environment
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

// Detect if the request is for the Back_End
$uri = $_SERVER['REQUEST_URI'];
$is_backend = strpos($uri, '/back_end') !== false || strpos($uri, '/BACK_END') !== false;

$st = 0;
include "data.php";

if ($is_backend) {
    header("Location: Back_end/index.php");
} else {
    define("PROTOCOL", $APP_PROTOCOL);
    define("SERVERNAME", $SERVER_NAME);
    define("APPNAME", $APP_NAME);

    define('BASEPATH', $front_end_path . 'system/');
    define('APPPATH', $front_end_path . 'application/');
    define('AUTHPATH', $front_end_path . 'application/auth/');
    define('VIEWPATH', $front_end_path . 'application/views/');
    define('SRC', $front_end_path . 'public/src/');
    define('PUBLICPATH', $front_end_path . 'public/');
    define('STORAGE', $front_end_path . 'public/storage/');
    define('ASSETS', $front_end_path . 'public/assets/');
    define('RESOURCES', $front_end_path . 'public/codeyro/private/resources/');
    define('SECURITY', $front_end_path . 'public/codeyro/private/resources/secure/securejs.js');
    define("SYSTEM_DATA", $front_end_path."system/SystemData/");

    define('APP_TITLE', $APP_TITLE);
    define('APP_DESCRIPTION', $APP_DESCRIPTION);

    define('ENCRYPTION_CODE', "1234567891031420");
    define("SECURE_KEY", "CodeYro");

    define('ROOT_PATH', PROTOCOL.SERVERNAME."/".APPNAME);
    define('API', SERVERNAME."/".APPNAME."/back_end/index.php/");

    //
    //When changing environment, you can modify $CY_APP_BASE_PATH
    $CY_APP_BASE_PATH = PROTOCOL.SERVERNAME."/".APPNAME;  //you can use: $APP_LINK = "http://www.CodeYro.com"; Production
    //$CY_APP_BASE_PATH = "http://www.CodeYro.com";   // Sample link when hosted, replace the link with your actual link
    // PROTOCOL.SERVERNAME."/".APPNAME is a default localhost environment, you can change it when it is hosted.
    //

    $APP_LINK = get_cy_base_url($CY_APP_BASE_PATH); 
    define("APP_LINK", $APP_LINK."/");


    define("YES", true);
    define("NO", false);
    
    require_once BASEPATH . 'core/CodeIgniter.php';
}
}
catch(Exception $e){
    header("Refresh: 0; url=generate");
}
?>

<?php
function get_cy_base_url($default = PROTOCOL.SERVERNAME."/".APPNAME) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    if (strpos($host, ':') !== false) {
        return "http://$host";
    } else {
        return $default;
    }
}


?>

