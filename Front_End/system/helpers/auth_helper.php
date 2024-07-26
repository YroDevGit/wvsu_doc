<?php

if(! function_exists("CODEYRO_AUTH_SETTINGS_1005_YROLEEEMZ_CY")){
    function CODEYRO_AUTH_SETTINGS_1005_YROLEEEMZ_CY(){
        include_once AUTHPATH."auth_settings.php";
        if(CY_AUTHENTICATE_USER_1005_YRO == true || CY_AUTHENTICATE_USER_1005_YRO == TRUE){
            CY_LOGIN_STATUS_1005_CHECKER_CODEYRO();
        }
    }
}

if(! function_exists("AUTHENTICATE_CY_USER")){
    function AUTHENTICATE_CY_USER($bool){
        /** ==> Void
         * authenticate user.
         * See config at application/auth/auth_settings
         */
        if($bool == true || $bool == TRUE){
            CODEYRO_AUTH_SETTINGS_1005_YROLEEEMZ_CY();
        }
    }
}
include_once AUTHPATH."user_roles.php";


?>