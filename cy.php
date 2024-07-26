<?php
/**
 * 
 * @author Tyrone Limen Malocom
 * CodeYro
 */
if (PHP_SAPI !== 'cli') {
    echo "This script should only be run from the command line.";
    exit(1);
}

$arguments = $argv;
$route = isset($arguments[1]) ? $arguments[1] : '';

include_once "IgniteData\ForCommand\command.php";
/**
 * Please don't modify this code without permission
 * This will be credited to CodeYro
 * This code created: July 10 2024
 * CodeYro Dev: Tyrone Limen Malocon
 */

$command = $php_command;
if($route){
    echo  getCommand($route);
}
else{
    echo $print_data;
}
passthru($command);
?>