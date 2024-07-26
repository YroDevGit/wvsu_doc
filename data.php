<?php

/** 
 * 
 * @package    CodeYRO
 * @author     Tyrone Lee Emz
 * @author name: Tyrone Limen Malocon
 * @copyright  Copyright (c) 2024 - Tyrone Lee Emz
 * @since      Version 1.0.0
 * @filesource
 * 
*/

// Change app details
$APP_TITLE = ""; // Optional
$APP_DESCRIPTION = ""; // Optional
$YEAR = date("Y-m-d"); // Optional

// When using apache, might need to use the default http://localhost/, might need to rename when server is changed
$SERVER_NAME = "localhost"; // Mandatory - this is the first thing you need to rename
$APP_NAME = "wvsu_docs"; // Mandatory - this is the second thing you need to rename
$APP_PROTOCOL = "http://"; // Mandatory - this is the second thing you need to rename


?>
<?php
function get_cy_base_link($default) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    if (strpos($host, ':') !== false) {
        return "http://$host";
    } else {
        return $default;
    }
}


?>