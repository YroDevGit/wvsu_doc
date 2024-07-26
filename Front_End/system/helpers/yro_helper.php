<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** 
 * 
 * @package	CodeIgniter
 * @author	Tyrone Lee Emz
 * @copyright	Copyright (c) 2024 - Tyrone Lee Emz
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 * 
*/
if(! function_exists("DISPLAY")){
    function DISPLAY($array){
        if(is_array($array)){
            print_r($array);
        }
        else{
            echo "DISPLAY function only works for array display.";
        }
    }
}

if (! function_exists("P")){
    function P($text){
        if(is_array($text)){
            print_r($text);
        }
        else{
            echo $text;
        }
    }
}

if (!function_exists('dd')) {
    function dd(...$vars) {
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
        die;
    }
}

if(! function_exists("isInternetConnected")){
    function isInternetConnected($url = "http://www.google.com") {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // timeout after 10 seconds
        curl_setopt($ch, CURLOPT_HEADER, true); // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true); // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return the transfer as a string
    
        $data = curl_exec($ch);
    
        if ($data) {
            curl_close($ch);
            return true;
        } else {
            curl_close($ch);
            return false;
        }
    }
}

if(! function_exists("HAS_INTERNET_CONNECTION")){
    function HAS_INTERNET_CONNECTION(string $site = "http://www.google.com"){
        /** ==> Boolean
         * check if there is internet connection.
         */
        return isInternetConnected($site);
    }
}

if(! function_exists("RESPONSE_DATA")){
    function RESPONSE_DATA(int $code, string $status, string $message, array $data=[]){
        /** ==> Array
         * set to json response.
         */
        return ["code" => $code, "status" => $status, "message" => $message, "data" => $data];
    }
}

if(! function_exists("JSON_RESPONSE_DATA")){
    function JSON_RESPONSE_DATA(int $code, string $status, string $message, array $data = []){
        /** ==> json response
         * json response with simple data, just code, status and message.
         */
        JSON_RESPONSE(RESPONSE_DATA($code, $status, $message, $data));
    }
}



?>