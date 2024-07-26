<?php
/**
 * CodeYRO blade...
 * By: Tyrone Limen Malocon...
 * 
 */

if(! function_exists("BLADE_VIEW")){
    function BLADE_VIEW($view, array $data = []){
        /** ==> Void
         * blade template view (CodeYRO)
         */
        $CY =& get_instance();
        $CY->blade->CODEYRO_VIEW($view, $data);
    }
}

if(! function_exists("BLADE_VIEW_CONTENT")){
    function BLADE_VIEW_CONTENT($view, array $data = []){
        /** ==> Void
         * view blade inside view/contents
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("contents/".$view, $data);
    }
}

if(! function_exists("BLADE_SHOW_CONTENT")){
    function BLADE_SHOW_CONTENT($view, array $data = []){
        /** ==> Void
         * view blade inside view/contents
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("contents/".$view, $data);
    }
}

if(! function_exists("BLADE_VIEW_PAGE")){
    function BLADE_VIEW_PAGE($view, array $data = []){
        /** ==> Void
         * view blade inside view/pages
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("pages/".$view, $data);
    }
}

if(! function_exists("BLADE_SHOW_PAGE")){
    function BLADE_SHOW_PAGE($view, array $data = []){
        /** ==> Void
         * view blade inside view/pages
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("pages/".$view, $data);
    }
}

if(! function_exists("BLADE_SHOW_INCLUDE_PAGE")){
    function BLADE_SHOW_INCLUDE_PAGE($view, array $data = []){
        /** ==> Void
         * view blade inside view/includes
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("includes/".$view, $data);
    }
}

if(! function_exists("BLADE_VIEW_INCLUDE_PAGE")){
    function BLADE_VIEW_INCLUDE_PAGE($view, array $data = []){
        /** ==> Void
         * view blade inside view/includes
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("includes/".$view, $data);
    }
}

if(! function_exists("BLADE_VIEW_ERROR")){
    function BLADE_VIEW_ERROR($view, array $data = []){
        /** ==> Void
         * view blade inside view/errors/html
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("errors/html/".$view, $data);
    }
}

if(! function_exists("BLADE_SHOW_ERROR")){
    function BLADE_SHOW_ERROR($view, array $data = []){
        /** ==> Void
         * view blade inside view/errors/html
         * blade template view (CodeYRO)
         */
        BLADE_VIEW("errors/html/".$view, $data);
    }
}





?>