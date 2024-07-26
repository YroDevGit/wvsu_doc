<?php
/**
 * CodeYro
 */
//include_once "IgniteData\ForCommand\cycy.php";
$php_command = 'php -S localhost:5510';
$print_data =  "CodeYro by: Yro Lee Emz\nStarting CodeYro server at http://localhost:5510\n\n HOMEPAGE: http://localhost:5510\n GENERATE PAGE: http://localhost:5510/generate (If generate page still exist)\n\n";
/**
 * Command: php cy.php
 */

 function getCommand($route){
    return "CodeYro by: Yro Lee Emz\nStarting CodeYro server at http://localhost:5510/$route\n\n HOMEPAGE: http://localhost:5510\n GENERATE PAGE: http://localhost:5510/generate (If generate page still exist)\n\n";
 }

?>