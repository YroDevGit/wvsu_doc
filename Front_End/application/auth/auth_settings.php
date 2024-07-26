<?php

$CY_AUTHENTICATE_USER = TRUE; //👈You can set it to TRUE when you want to add authentication.

if(! function_exists("CY_LOGIN_STATUS_1005_CHECKER_CODEYRO")){
    function CY_LOGIN_STATUS_1005_CHECKER_CODEYRO(){
    $logged_in = IS_LOGGED_IN();
    if(! $logged_in ){
    /**
     * This is authentication / Login settings
     * Please don't rename function name above, might cause errors.
     * required: SET_LOGIN(true) to be effective.
     */ //👆 Heading condtion is sensitive, may cause errors when modified

     
    //Configuration starts here...

    //When user's athentication failed or not logged in, please add code here...

    CY_REDIRECT("codeyro/NotAuthenticated"); // You can modify and put your own error page.













    

    


    // End of condition...
    //Please don't remove the exit;
    exit;
    }
    }
}
//Don't modify code definitions here👇
if(! defined("CY_AUTHENTICATE_USER_1005_YRO")){define("CY_AUTHENTICATE_USER_1005_YRO", $CY_AUTHENTICATE_USER);} 
?>