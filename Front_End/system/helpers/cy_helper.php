<?php

/**
 * CodeYRO functions
 */

if(! function_exists("CY_VIEW")){
    function CY_VIEW($view, array $data=[]){
        /** ==> Void
         * CY_VIEW parameters: $view = view filename. $data = data to be pass from controller to view file
         * Example use: view filename is required as parameter
         * CY_VIEW('view_filename', ['page'=>'page1']);  // view_filename is the view filename
         */
        $CY =& get_instance();
        if(empty($data)){
            $CY->load->view($view);
        }
        else{
            $CY->load->view($view,$data);
        }
    }
}

if(! function_exists("CY_SHOW")){
    function CY_SHOW($view, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/
         * CY_SHOW parameters: $view = view filename. $data = data to be pass from controller to view file
         * Example use: view filename is required as parameter
         * CY_SHOW('view_filename', ['page'=>'page1']);  // view_filename is the view filename
         */
        $CY =& get_instance();
        if(empty($data)){
            $CY->load->view($view);
        }
        else{
            $CY->load->view($view,$data);
        }
    }
}

if(! function_exists("CY_VIEW_PAGE")){
    function CY_VIEW_PAGE($page, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/pages/
         * parameters: $page = page filename inside views/pages/. $data = data to be pass from controller to view file
         */
         $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("pages/".$page);
        }
        else{
            $CY->load->view("pages/".$page,$data);
        }
    }
}

if(! function_exists("CY_VIEW_INCLUDE_PAGE")){
    function CY_VIEW_INCLUDE_PAGE($page, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/includes/
         * parameters: $page = page filename inside views/includes/. $data = data to be pass from controller to view file
         */
         $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("includes/".$page);
        }
        else{
            $CY->load->view("includes/".$page,$data);
        }
    }
}

if(! function_exists("CY_SHOW_INCLUDE_PAGE")){
    function CY_SHOW_INCLUDE_PAGE($page, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/includes/
         * parameters: $page = page filename inside views/includes/. $data = data to be pass from controller to view file
         */
         $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("includes/".$page);
        }
        else{
            $CY->load->view("includes/".$page,$data);
        }
    }
}

if(! function_exists("CY_SHOW_ERROR")){
    function CY_SHOW_ERROR($page, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/errors/html/
         * parameters: $page = page filename inside views/errors/html/. $data = data to be pass from controller to view file
         */
         $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("errors/html/".$page);
        }
        else{
            $CY->load->view("errors/html/".$page,$data);
        }
    }
}

if(! function_exists("CY_VIEW_ERROR")){
    function CY_VIEW_ERROR($page, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/errors/html/
         * parameters: $page = page filename inside views/errors/html/. $data = data to be pass from controller to view file
         */
         $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("errors/html/".$page);
        }
        else{
            $CY->load->view("errors/html/".$page,$data);
        }
    }
}

if(! function_exists("CY_SHOW_PAGE")){
    function CY_SHOW_PAGE($page, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/pages/
         * parameters: $page = page filename inside views/pages/. $data = data to be pass from controller to view file
         */
         $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("pages/".$page);
        }
        else{
            $CY->load->view("pages/".$page,$data);
        }
    }
}

if(! function_exists("CY_VIEW_CONTENT")){
    function CY_VIEW_CONTENT($content, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/contents/
         * parameters: $content = content filename inside views/contents/. $data = data to be pass from controller to view file
         */
        $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("contents/".$content);
        }
        else{
            $CY->load->view("contents/".$content,$data);
        }
    }
}

if(! function_exists("CY_SHOW_CONTENT")){
    function CY_SHOW_CONTENT($content, array $data=[]){
        /** ==> Void
         * Show php content inside application/views/contents/
         * parameters: $content = content filename inside views/contents/. $data = data to be pass from controller to view file
         */
        $CY =& get_instance();
        if(empty($data)){
            $CY->load->view("contents/".$content);
        }
        else{
            $CY->load->view("contents/".$content,$data);
        }
    }
}


if(! function_exists("POST")){
    function POST($inputname){
        /** ==> Any
         * Input value from form submission
         * in CY, you can also use INPUT() and INPUT_VALUE(), the same output as POST()
         */
        $CY =& get_instance();
        return $CY->POST[$inputname];
    }
}

if(! function_exists("HAS_FORM_SUBMITTED")){
    function HAS_FORM_SUBMITTED($method = "post"){
        /** ==> Boolean
         * check if form is submitted
         * True if submitted
         * False if not.
         */
        $ret = false;
        $CY =& get_instance();
        if($method == "POST" || $method == "post"){
            if($CY->POST){
                $CYPOST = $CY->POST;
                if(empty($CYPOST)){
                    $ret = false;
                }
                else{
                    $ret = true;
                }
            }
            else{
                $ret = false;
            }
        }
        elseif($method == "GET" || $method == "get"){
            if($CY->GET){
                $CYGET = $CY->GET;
                if(empty($CYGET)){
                    $ret = false;
                }
                else{
                    $ret = true;
                }
            }
            else{
                $ret = false;
            } 
        }
        else{
            die("CodeYRO error: method undefined.! accepts only POST and GET");
        }
        return $ret;
    }
}

if(! function_exists("HAS_POST_SUBMITTED")){
    function HAS_POST_SUBMITTED(){
        /** ==> Boolean
         * check if post submitted
         * effects only if form method is POST/post\
         * same to: FORM_SUBMITTED('POST');
         */
        return HAS_FORM_SUBMITTED("POST");
    }
}

if(! function_exists("HAS_GET_SUBMITTED")){
    function HAS_GET_SUBMITTED(){
        /** ==> Boolean
         * check if post submitted
         * effects only if form method is POST/post\
         * same to: FORM_SUBMITTED('POST');
         */
        return HAS_FORM_SUBMITTED("GET");
    }
}


if(! function_exists("INPUT_VALUE")){
    function INPUT_VALUE($inputname){
        /** ==> Any
         * Input value from form submission
         */
        return POST($inputname);
    }
}

if(! function_exists("INPUT_DATE")){
    function INPUT_DATE($inputname){
        /** ==> String / Date
         * Input date from form submission
         * Effective when parsing date.
         * use this when date is not in default format.
         */
        return CY_PARSE_DATE(POST($inputname));
    }
}

if(! function_exists("POST_DATE")){
    function POST_DATE($inputname){
        /** ==> String / Date
         * Input date from form submission
         * Effective when parsing date.
         * used this when date is not in default format.
         */
        return INPUT_DATE($inputname);
    }
}

if(! function_exists("INPUT")){
    function INPUT($inputname){
        /** ==> Any
         * Input value from form submission
         */
        return POST($inputname);
    }
}


if(! function_exists("POST_DATA")){
    function POST_DATA(){
        /** ==> Array
         * Post array from form submission
         */
        $CY =& get_instance();
        return $CY->POST;
    }
}

if(! function_exists("SET_VALIDATION")){
    /** => Void
     * set validation to the specific form input
     */
    function SET_VALIDATION($inputname, $label, $rules){
        $CY =& get_instance();
        $CY->form_validation->set_rules($inputname, $label, $rules);
        return $CY;
    }
}

if(! function_exists("GET")){
    function GET($inputname){
        /** ==> Any
         * Get value from url parameters
         */
        $CY =& get_instance();
        $value = $CY->input->get($inputname);
        return $value;
    }
}

if(! function_exists("GET_DATA")){
    function GET_DATA(){
        /** ==> Any
         * Get data from url parameters
         */
        $CY =& get_instance();
        $value = $CY->input->get();
        return $value;
    }
}


if (!function_exists('IS_VALIDATION_FAILED')) {
    function IS_VALIDATION_FAILED() {
        /** => Boolean
         * Check if there is input validation that fails
         * Required SET_VALIDATION function
         */
        $CY =& get_instance();
        if ($CY->form_validation->run() == false) {
            $CY->session->set_flashdata('cy_validation_error_1005CodeYro05', VALIDATION_ERROR_LIST());
            return true;
        }

        return false; 
    }
}

if(! function_exists("VALIDATION_FAILED_REDIRECT")){
    function VALIDATION_FAILED_REDIRECT($page){
        /** ==> Void
         *  ==> Redirect
         * Redirect with error messages
         */
        $CY =& get_instance();
        if ($CY->form_validation->run() == false) {
            $CY->session->set_flashdata('cy_validation_error_1005CodeYro05', VALIDATION_ERROR_LIST());
            CY_REDIRECT($page, [], true);
        }
        else{
            P(["code"=>-1, "status"=>"Error","message"=>"Invalid call, there no failed validation found.!, you can call this function if validation is failed."]);
        }
    }
}


if(! function_exists("VALIDATION_GET_FLASH_ERROR")){
    function VALIDATION_GET_FLASH_ERROR($inputname){
        /** => Array
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        $all_error = (!empty(GET_FLASHDATA("cy_validation_error_1005CodeYro05"))?GET_FLASHDATA("cy_validation_error_1005CodeYro05"): []);
        $ret = "";
        if(isset($all_error[$inputname])){
            $ret = $all_error[$inputname];
        }
        else{
            $ret = "";
        }
        return $ret;
    }
}

if(! function_exists("VALIDATION_INPUT_ERROR")){
    function VALIDATION_INPUT_ERROR($inputname){
        /** => Array
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         * Same to VALIDATION_GET_FLASH_ERROR('input');
         * Same to VALIDATION_FAILED_MESSAGE('input');
         */
        return VALIDATION_GET_FLASH_ERROR($inputname);
    }
}

if(! function_exists("VALIDATION_FAILED_MESSAGE_ARRAY")){
    function VALIDATION_FAILED_MESSAGE_ARRAY(){
        /** => Array
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        $all_error = (!empty(GET_FLASHDATA("cy_validation_error_1005CodeYro05"))?GET_FLASHDATA("cy_validation_error_1005CodeYro05"): []);
        return $all_error;
    }
}


if(! function_exists("HAS_VALIDATION_ERRORS")){
    function HAS_VALIDATION_ERRORS(){
        /** ==> Boolean
         * Check if there is a validation error in form submission.
         * Effects in both view and redirects.
         * Required: VALIDATION_FAILED().
         */
        $ret = false;
        $val_errors = GET_FLASHDATA("cy_validation_error_1005CodeYro05");
        if($val_errors){
            if(empty($val_errors)){
                $ret = false;
            }
            else{
                $ret = true;
            }
        }
        else{
            $ret = false;
        }
        return $ret;
    }
}

if(! function_exists("VALIDATION_HAS_ERRORS")){
    function VALIDATION_HAS_ERRORS(){
        /** ==> Boolean
         * Check if there is a validation error in form submission.
         * Effects in both view and redirects.
         * Required: VALIDATION_FAILED().
         */
        return HAS_VALIDATION_ERRORS();
    }
}

if(! function_exists("VALIDATION_FAILED_MESSAGE_LIST")){
    function VALIDATION_FAILED_MESSAGE_LIST(){
        /** => Array
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        return VALIDATION_FAILED_MESSAGE_ARRAY();
    }
}

if(! function_exists("VALIDATION_FAILED_MESSAGE")){
    function VALIDATION_FAILED_MESSAGE($inputname){ //String
        /** => String
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        return VALIDATION_GET_FLASH_ERROR($inputname);
    }
}

if(! function_exists("VALIDATION_ALL_FAILED_LIST")){ 
    function VALIDATION_ALL_FAILED_LIST(){
        /** => array
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        $all_error = (!empty(GET_FLASHDATA("cy_validation_error_1005CodeYro05"))?GET_FLASHDATA("cy_validation_error_1005CodeYro05"): []);
        return $all_error;
    }
}



if(! function_exists("VALIDATION_ERROR_LIST")){
    function VALIDATION_ERROR_LIST(){
        /** => Array
         *  Not effective in any redirects
         */
        $CY =& get_instance();
        return $CY->form_validation->validation_errors();
    }
}

if(! function_exists("CY_USE_MODEL")){
    function CY_USE_MODEL($modelname){
        $CY =& get_instance();
        $CY->load->model($modelname);
    }
}

if(! function_exists("SET_SESSION_ARRAY")){
    function SET_SESSION_ARRAY(array $session){
        /**
         *  => Void
         */
        $CY =& get_instance();
        if(is_array($session)){
            $CY->session->set_userdata($session);
        }
        else{
            $CY->session->set_userdata($session,"null");
        }
    }
}

if(! function_exists("SET_SESSION")){
    function SET_SESSION(string $key, $value){
        /**
         *  => Void
         * Value can be a string or array.
         */
        $CY =& get_instance();
        $CY->session->set_userdata($key,$value);
    }
}

if(! function_exists("GET_SESSION")){
    function GET_SESSION(string $key){
        /**
         *  => Array or String
         */
        $CY =& get_instance();
        return $CY->session->userdata($key);
    }
}

if(! function_exists("GET_ALL_SESSION")){
    function GET_ALL_SESSION(){
        /**
         *  => Array
         */
        $CY =& get_instance();
        return $CY->session->all_userdata();
    }
}

if(! function_exists("REMOVE_SESSION")){
    function REMOVE_SESSION($key){
        /**
         *  => Void
         */
        $CY =& get_instance();
        $CY->session->unset_userdata($key);
    }
}

if(! function_exists("REMOVE_ALL_SESSIONS")){
    /**
         *  => Void
         */
    function REMOVE_ALL_SESSIONS(){
        $CY =& get_instance();
        $CY->session->sess_destroy();
    }
}

if(! function_exists("SET_COOKIE")){
    function SET_COOKIE($key, $value, $expiration = 86500){
        /**
         *  => Void
         */
        $CY =& get_instance();
        $data = null;
        if(is_array($value)){
            $data = json_encode($value);
        }
        else{
            $data = $$value;
        }
        $CY->input->set_cookie($key, $data, $expiration);
    }
}

if(! function_exists("COOKIE_EXIST")){
    function COOKIE_EXIST($input){
        /**
         * Boolean
         */
        $ret = false;
        $cookie_value = get_cookie($input);
        if ($cookie_value !== NULL) {
            $ret = true;
        } else {
            $ret = false;
        }
        return $ret;
    }
}

if(! function_exists("GET_COOKIE")){
    function GET_COOKIE($key){
        /**
         *  => String or Array
         */
        $ret = null;
        $CY =& get_instance(); 

        $cookie = $CY->input->cookie($key, TRUE);

        if ($cookie) {
            $decoded = json_decode($cookie, true);
            
            if (json_last_error() === JSON_ERROR_NONE) {
                if (is_array($decoded)) {
                    $ret = $decoded;
                } else {
                    $ret = $cookie;
                }
            } else {
                $ret = $cookie;
            }
        } else {
            return;
        }
           
        return $ret;
    }
}

if(! function_exists("REMOVE_COOKIE")){
    function REMOVE_COOKIE($key){
        /**
         *  => Void
         */
        setcookie($key, '', time() - 9999999999, '/');
    }
}

if(! function_exists("SET_FLASHDATA")){
    function SET_FLASHDATA($key, $value){
        /**
         *  => Void
         */
        $CY =& get_instance();    
        $CY->session->set_flashdata($key, $value);
    }
}
if(! function_exists("GET_FLASHDATA")){
    function GET_FLASHDATA($key){
        /**
         *  => Array or String
         */
        $CY =& get_instance();    
        return $CY->session->flashdata($key);
    }
}


if (!function_exists("CY_STRING_VALUE")) {
    function CY_STRING_VALUE(string $val, string $default="") {
        /** => String
         * if the $val is not set or exist then display the default value of "" or null.
         * [Using isset]
         */
        if($val){
            return $val;
        }
        else{
            return $default;
        }
    }
}

if (!function_exists("CY_OBJECT_VALUE")) {
    function CY_OBJECT_VALUE($val, $default) {
        /** => Object
         * if the $val object is not exist then display default
         * [Using isset]
         */
        if($val){
            return $val;
        }
        else{
            return $default;
        }
    }
}


if (!function_exists("CY_INT_VALUE")) {
    function CY_INT_VALUE(int $val, int $default=0) {
        /** => Int / Integer
         * if the $val is not set or exist then display the default value of 0 or null.
         * [Using isset]
         */
        if($val){
            return $val;
        }
        else{
            return $default;
        }
    }
}

if (!function_exists("CY_FLOAT_VALUE")) {
    function CY_FLOAT_VALUE(float $val, float $default=0) {
        /** => Float
         * if the $val is not set or exist then display the default value of 0 or null.
         * [Using isset]
         */
        if($val){
            return $val;
        }
        else{
            return $default;
        }
    }
}

if(! function_exists("IS_EXIST")){
    function IS_EXIST($val){
        /** ==> Boolean
         * check if $value is existing.
         * TRUE if existing, False if not.
         * [Using isset]
         */
        if($val){
            return true;
        }
        else{
            return false;
        }
    }
}


if(! function_exists("IS_SET")){
    function IS_SET(&$val){
        /** ==> Boolean
         * check if $value is existing.
         * TRUE if existing, False if not.
         * [Using isset]
         */
        return IS_EXIST($val);
    }
}

if(! function_exists("INPUT_EXIST")){
    function INPUT_EXIST($inputname){
        /** => Boolean
         * check if form input exist.
         * same to: HAS_INPUT_NAME('inputname')
         * Required: form submit (post) to be effective
         */
        return IS_SET(POST($inputname));
    }
}

if(! function_exists("HAS_INPUT_NAME")){
    function HAS_INPUT_NAME($inputname){
        /** => Boolean
         * check if form input exist.
         * same to: INPUT_EXIST('inputname')
         * Required: form submit (post) to be effective
         */
        return IS_SET(POST($inputname));
    }
}

if(! function_exists("BUTTON_CLICKED")){
    function BUTTON_CLICKED($buttonname){
        /** => Boolean
         * check if specific button is clicked.
         * Required: form submit (post) to be effective
         */
        return IS_SET(POST($buttonname));
    }
}

if(! function_exists("IS_BUTTON_CLICKED")){
    function IS_BUTTON_CLICKED($buttonname){
        /** => Boolean
         * check if specific button is clicked.
         * Required: form submit (post) to be effective
         * The same with: BUTTON_CLICKED('buttonname');
         */
        return IS_SET(POST($buttonname));
    }
}

if(! function_exists("CHECKBOX_CKECKED")){
    function CHECKBOX_CKECKED($checkboxname){
        /** => Boolean
         * check if specific checkbox is checked.
         * same to CHECKBOX_IS_CKECKED('checkboxname')
         * Required: form submit (post) to be effective
         */
        return IS_SET(POST($checkboxname));
    }
}

if(! function_exists("IS_CHECKBOX_CKECKED")){
    function IS_CHECKBOX_CKECKED($checkboxname){
        /** => Boolean
         * check if specific checkbox is checked.
         * same to CHECKBOX_IS_CKECKED('checkboxname')
         * Required: form submit (post) to be effective
         */
        return IS_SET(POST($checkboxname));
    }
}

if(! function_exists("CHECKBOX_IS_CKECKED")){
    function CHECKBOX_IS_CKECKED($checkboxname){
        /** => Boolean
         * check if specific checkbox is checked.
         * same to CHECKBOX_CKECKED('checkboxname')
         * Required: form submit (post) to be effective
         */
        return IS_SET(POST($checkboxname));
    }
}

if(! function_exists("UN_SET")){
    function UN_SET(&$val){
        /** ==> Void
         * Remove $value existence
         */
        unset($val);
    }
}

if(! function_exists("CY_PARSE_DATE")){
    function CY_PARSE_DATE($value){
        /** ==> Date / Date string
         * convert value to Date
         */
        $date = new DateTime($value);
        $formattedDate = $date->format('Y-m-d');
        return $formattedDate;
    }
}

if(! function_exists("CY_PARSE_STRING")){
    function CY_PARSE_STRING($value){
        /** ==> String
         * convert value to String 
         */
        return strval($value);
    }
}

if(! function_exists("CY_PARSE_INT")){
    function CY_PARSE_INT($value){
        /** ==> Int / Integer
         * convert value to Integer 
         */
        return intval($value);
    }
}

if(! function_exists("CY_PARSE_FLOAT")){
    function CY_PARSE_FLOAT($value){
        /** ==> Float
         * convert value to Float
         */
        return floatval($value);
    }
}

if(! function_exists("CY_PARSE_DOUBLE")){
    function CY_PARSE_DOUBLE($value){
        /** ==> Double
         * convert value to Double
         */
        return doubleval($value);
    }
}

if(! function_exists('CY_PASSWORD_HASH')){
    function CY_PASSWORD_HASH($password){
        /** => String
         * make password hashed.
         */
        return password_hash($password, PASSWORD_DEFAULT);
    }
}

if(! function_exists("REMOVE_ALL_FLASHDATA")){
    function REMOVE_ALL_FLASHDATA(){
        /** ==> Void
         * Remove all flash data.
         */
        $CY =& get_instance();
        $flash_keys = $CY->session->flashdata();

        foreach ($flash_keys as $key => $value) {
            $CY->session->unset_flashdata($key);
        }
    }
}

if(! function_exists("REMOVE_ALL_COOKIES")){
    function REMOVE_ALL_COOKIES(){
        /** ==> Void
         * Remove all cookies.
         */
        foreach ($_COOKIE as $key => $value) {
            REMOVE_COOKIE($key);
        }
    }
}

if(! function_exists("SET_LOGIN")){
    function SET_LOGIN($status = true , array $data, array $data2 = [], array $data3 = [], array $data4 = [], array $data5 = []){
        /** ==> Void
         * param: $status is boolean and $data is array.
         * $data can be use in User athentication and roles.
         * set login status and data.
         * When using when user_roles assignation is activated, make sure to have user $data.
         * Using cookies.
         */
        if(! is_bool($status)){
            die("Error: status must be boolean [TRUE or FALSE]");
        }
        elseif(! is_array($data)){
            die("Error: data must be an array ['id' => '1005' , 'name' => 'Yro']");
        }
        else{
            if($status == false || $status == FALSE){
                //REMOVE_LOGIN_DATA(true); 
            }
            else{
               if(! empty($data)){
                SET_LOGIN_DATA($data, $data2, $data3, $data4, $data5);
               }
            }  
        }
    }
}


if(! function_exists("REMOVE_LOGIN_DATA")){
    function REMOVE_LOGIN_DATA($delete_sessions=true){
        /** ==> Void
         * $delete_sessions: if sessions will also be removed.
         */
        if(GET_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ")){
            REMOVE_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ");
        }
        if($delete_sessions == true){
            REMOVE_ALL_SESSIONS();
            REMOVE_ALL_FLASHDATA();
        }
    }
}

if(! function_exists("SET_LOGIN_DATA")){
    function SET_LOGIN_DATA(array $data, array $data2 = [], array $data3 = [], array $data4 = [], array $data5 = []){
        /** ==> Void
         * Set Login data, can be use in User athentication and roles.
         */
        $login_data = [
            "status" => true,
            "data" => $data,
            "data2" => $data2,
            "data3" => $data3,
            "data4" => $data4,
            "data5" => $data5
        ];
        SET_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ", $login_data);
    }
}

if(! function_exists("LOG_OUT")){
    function LOG_OUT(bool $remove_sessions = true){
        /** ==> Void
         * set login to false. then remove all session data.
         * Using cookies.
         * same to: SET_LOGIN(false);
         */
        if($remove_sessions){
            REMOVE_LOGIN_DATA(true);
        }
        else{
            REMOVE_LOGIN_DATA(false);
        }
        SET_LOGIN(false,[]);
    }
}

if(! function_exists("GET_LOGIN_DATA")){
    function GET_LOGIN_DATA(string $key=""){
        /** => Array / String
         * Get Login data.
         * When key is not set = returns array.
         * When key is set = returns any.
         * Using cookies.
         */
        $ret = null;
        $l_cookie = GET_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ");
        if($l_cookie){
            $login_cookie = $l_cookie;
            if($key == null || $key == NULL || $key == ""){
                $ret = $login_cookie["data"];
            }
            else{
                if(isset($login_cookie["data"][$key])){
                    $ret = $login_cookie["data"][$key];
                }
                else{
                    die("Error: No key '".$key."' found in login cookie data");
                } 
            } 
        }
        else{
            die("Error: No login cookie found.! login cookie might not set.");
        }
        return $ret;
    }
}

if(! function_exists("GET_LOGIN_INDEX_DATA")){
    function GET_LOGIN_INDEX_DATA(string $data, string $key=""){
        /** => Array / String
         * Get Login data.
         * When key is not set = returns array.
         * When key is set = returns any.
         * Using cookies.
         */
        $ret = null;
        $l_cookie = GET_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ");
        if($l_cookie){
            $login_cookie = $l_cookie;
            if($key == null || $key == NULL || $key == ""){
                $ret = $login_cookie[$data];
            }
            else{
                if(isset($login_cookie[$data][$key])){
                    $ret = $login_cookie[$data][$key];
                }
                else{
                    die("Error: No key '".$key."' found in login cookie data");
                } 
            } 
        }
        else{
            die("Error: No login cookie found.! login cookie might not set.");
        }
        return $ret;
    }
}

if(! function_exists("HAS_LOGIN_DATA")){
    function HAS_LOGIN_DATA(){
        /** ==> Boolean
         * check if user is logged in and login data has set.
         */
        $ret = null;
        $l_cookie = GET_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ");
        if($l_cookie){
            $login_cookie = $l_cookie;
            if(in_array("data", $login_cookie)){
                if(empty($login_cookie['data'])){
                    $ret = false;
                }
                else{
                    $ret = true;
                }
            }
            else{
                $ret = false;
            }  
        }
        else{
            $ret = false;
        }
        return $ret;
    }
}

if(! function_exists("IS_LOGGED_IN")){
    function IS_LOGGED_IN(){
        /** ==> Boolean
         * Check if login status is TRUE or FALSE.
         * Using cookies.
         */
        $ret = false;
        if(GET_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ")){
            $login_cookie = GET_COOKIE("CY_LOGIN_1005_COOKIE_CODEYRO_05_YROLEEEMZ");
            if(isset($login_cookie["status"])){
                $status = $login_cookie["status"];
                $ret = $status;
            }
            else{
                $ret = false;
            }
        }
        else{
            $ret = false;
        }
        return $ret;
    }
}

if(! function_exists("LOGGED_IN")){
    function LOGGED_IN(){
        /** ==> Boolean
         * Check if login status is TRUE or FALSE.
         * Using cookies.
         * Same to: IS_LOGGED_IN and USER_HAS_LOGGED_IN
         */
        return IS_LOGGED_IN();
    }
}

if(! function_exists("USER_HAS_LOGGED_IN")){
    function USER_HAS_LOGGED_IN(){
        /** ==> Boolean
         * Check if login status is TRUE or FALSE.
         * Using cookies.
         * Same to: IS_LOGGED_IN and LOGGED_IN
         */
        return IS_LOGGED_IN();
    }
}


if(! function_exists("CY_STRING_CODE")){
    function CY_STRING_CODE($lenght = 10){
        /** ==> String
         * random string code.
         */
        return random_string('alnum', $lenght);
    }
}

if(! function_exists("CY_INT_CODE")){
    function CY_INT_CODE($lenght = 10){
        /** ==> Integer
         * random integer code.
         */
        return random_string('numeric', $lenght);
    }
}


if(! function_exists("CY_ALPHA_CODE")){
    function CY_ALPHA_CODE($lenght = 10){
        /** ==> String
         * random letters.
         */
        return random_string('alpha', $lenght);
    }
}

if(! function_exists("CY_UNIQUE_CODE")){
    function CY_UNIQUE_CODE($lenght = 10){
        /** ==> String
         * unique characters.
         */
        return random_string('unique', $lenght);
    }
}

if(! function_exists("CY_REALNUM_CODE")){
    function CY_REALNUM_CODE($lenght = 10){
        /** ==> String
         * random numbers with no zero.
         */
        return random_string('nozero', $lenght);
    }
}

if(! function_exists("CY_JSON_RESPONSE")){
    function CY_JSON_RESPONSE($value, bool $direct=true){
        /** => Json / js array
         * convert php array to  js / json array.
         */
        if($direct == false){
            return json_encode($value);
        }
        else{
            echo json_encode($value);
        }
    }
}

if(! function_exists("JSON_RESPONSE")){
    function JSON_RESPONSE(array $value, bool $direct=true){
        /** => Json / js array
         * convert php array to  js / json array.
         */
        if($direct == false){
            return json_encode($value);
        }
        else{
            echo json_encode($value); exit;
        }
    }
}

if(! function_exists("CY_JSON_ENCODE")){
    function CY_JSON_ENCODE($value){
        /** => Json / js array
         * convert php array to  js / json array.
         */
        return json_encode($value);
    }
}

if(! function_exists("CY_JSON_DECODE")){
    function CY_JSON_DECODE($value, $bool=true){
        /** => Array
         * conver js / json array to php array.
         */
        return json_decode($value, $bool);
    }
}

if(! function_exists("JSON_TO_PHP_ARRAY")){
    function JSON_TO_PHP_ARRAY($value, $bool=true){
        /** => Array
         * conver js / json array to php array.
         */
        return json_decode($value, $bool);
    }
}

if(! function_exists("PHP_TO_JSON_ARRAY")){
    function PHP_TO_JSON_ARRAY($value){
        /** => Json / js array
         * convert php array to  js / json array.
         */
        return json_encode($value);
    }
}

if(! function_exists("SET_REMEMBER")){
    function SET_REMEMBER($data){
        /** => Void
         * set data to remember
         */
        if(! is_array($data)){
            die("CodeYro ERROR: data must be an array.!");
        }
        else{
            SET_COOKIE("CODEYRO_REMEMBERME_1005_REM_EZ_5510_CY", $data);
        }
    }
}

if(! function_exists("GET_REMEMBER")){
    function GET_REMEMBER($key=""){
        /** => String / Array
         * if there is no key parameter = returns array.
         * if there is a key parameter = returns string.
         */
        $ret = null;
        if(GET_COOKIE("CODEYRO_REMEMBERME_1005_REM_EZ_5510_CY")){
            $remembered = GET_COOKIE("CODEYRO_REMEMBERME_1005_REM_EZ_5510_CY");
            if($key=="" || $key==null){
                $ret = $remembered;
            }
            else{
                if(IS_SET($remembered[$key])){
                    $ret = $remembered[$key];
                }
                else{
                    die("CodeYRO ERROR: Key '".$key."' not found in the remembered data.!");
                }
            }
        }
        else{
            die("CodeYRO error: remember data not set.!");
        }
        return $ret; 
    }
}


if(! function_exists("FORGET_REMEMBER_DATA")){
    function FORGET_REMEMBER_DATA(){
        /** => Void
         * Forget remembered data
         */
        if(GET_COOKIE("CODEYRO_REMEMBERME_1005_REM_EZ_5510_CY")){
            REMOVE_COOKIE("CODEYRO_REMEMBERME_1005_REM_EZ_5510_CY");
        }
    }
}

if(! function_exists("FORGET_REMEMBER")){
    function REMOVE_REMEMBER(){
        /** => Void
         * Forget remembered data
         */
        FORGET_REMEMBER_DATA();
    }
}

if(! function_exists("FORGET")){
    function FORGET(){
        /** => Void
         * Forget remembered data
         */
        REMOVE_REMEMBER();
    }
}

if(! function_exists("HAS_REMEMBER_DATA")){
    function HAS_REMEMBER_DATA(){
        /** => Boolean
         * True or False
         */
        $ret = false;
        if(GET_COOKIE("CODEYRO_REMEMBERME_1005_REM_EZ_5510_CY")){
            $ret = true;
        }
        return $ret;
    }
}

if(! function_exists("HAS_REMEMBER")){
    function HAS_REMEMBER(){
        /** => Boolean
         * True or False
         */
        $ret = false;
        if(GET_COOKIE("CODEYRO_REMEMBERME_1005_REM_EZ_5510_CY")){
            $ret = true;
        }
        return $ret;
    }
}

if(! function_exists("GET_DEVICE_NAME")){
    function GET_DEVICE_NAME(){
        /** => String
         * returns the name of t
         */
        return gethostname();
    }
}

if(! function_exists("ARRAY_IS_MULTIDIMENSIONAL")){
    function ARRAY_IS_MULTIDIMENSIONAL($array): bool {
        /** ==>Boolean
         * check if the array is multi-dimensional (array inside array).
         */
        if(! is_array($array)){
            die("Error: parameter is not an array");
        }
        else{
            foreach ($array as $element) {
                if (is_array($element)) {
                    return true;
                }
            }
        }
        return false;
    }
}

if(! function_exists("IS_MULTIDIMENSIONAL_ARRAY")){
    function IS_MULTIDIMENSIONAL_ARRAY($array): bool{
        /** ==>Boolean
         * check if the array is multi-dimensional (array inside array).
         */
        return ARRAY_IS_MULTIDIMENSIONAL($array);
    }
}

if(! function_exists("ARRAY_FIRST_ROW")){
    function ARRAY_FIRST_ROW($array, $key=""){
        /** Array / String
         * if $key is NOT set: returns array
         * if $key is set: returns string
         */
        $ret = [];
        if(! is_array($array)){
            die("Error: parameter is not an array");
        }
        else{
            if(IS_MULTIDIMENSIONAL_ARRAY($array)){
                if($key=="" || $key == null){
                    $ret = $array[0];
                }
                else{
                    $ret = $array[0][$key];
                }
            }
            else{
                $ret = $array;
            }
        }
        return $ret;
    }
}

if(! function_exists("ARRAY_GET_ROW")){
    function ARRAY_GET_ROW($array, $row, $key=""){
        /** Array / String
         * if $key is NOT set: returns array
         * if $key is set: returns string
         */
        $ret = [];
        if(! is_array($array)){
            die("Error: parameter \$array is not an array");
        }
        else{
            if(IS_MULTIDIMENSIONAL_ARRAY($array)){
                if($key=="" || $key == null){
                    $ret = $array[$row];
                }
                else{
                    $ret = $array[$row][$key];
                }
            }
            else{
                $ret = $array;
            }
        }
        return $ret;
    }
}

if(! function_exists("FILES")){
    function FILES($inputname="", $attr=""){
        /** Array / String (File path)
         * return the file path
         */
        if($inputname=="" || $inputname==null){
            return $_FILES;
        }
        else{
            if($attr =="" || $attr == null){
               return $_FILES[$inputname];
            }
            else{
                return $_FILES[$inputname][$attr];
            }
        } 
    }
}

if(! function_exists("FILENAME")){
    function FILENAME($inputname=""){
        /** String
         * return the file name
         */
        return FILES($inputname,"name");
}
}

if(! function_exists("VALIDATION_SET_INPUT_ERROR")){
    function VALIDATION_SET_INPUT_ERROR($inputname, $errormessage){
        /** ==> Void
         * Manually add validation error.
         */
        $CY =& get_instance();
        $CY->form_validation->set_ci_error_message($inputname, $errormessage);
    }
}

if(! function_exists("HAS_FILE_SUBMITTED")){
    function HAS_FILE_SUBMITTED($inputname){
        /** ==> Boolean
         * check if there is file included in POST data.
         * form submit.
         * Required enctype="multipart/form-data"
         */
        $ret = false;
        if($_FILES[$inputname]){
            if($_FILES[$inputname]["name"]=="" || $_FILES[$inputname]["name"]==null){
                $ret = false;
            }
            else{
                $ret = true;
            }
        }
        else{
            $ret = false;
        }
        return $ret;
    }
}

if(! function_exists("SET_FILE_VALIDATION")){
    function SET_FILE_VALIDATION($fieldname, $label, $rules="", $rulesname = ""){
        /** ==> Void
         * set file validation.
         * only works in input type = file
         * Don't forget the enctype="multipart/form-data" in <form>
         */
        if(HAS_FILE_SUBMITTED($fieldname)){
            $filename = $_FILES[$fieldname]['name'];
            $file_info = pathinfo($filename);
            $name = $file_info['filename'];  
            $extension = $file_info['extension']; 
            if($rules != null && $rules != ""){
                if(STRING_CONTAINS($rules, $extension)){

                }
                else{
                    if($rulesname == "" || $rulesname == null){
                        VALIDATION_SET_INPUT_ERROR($fieldname, $label." file type should only ".STRING_SEPARATE_BY($rules, "|"));
                    }
                    else{
                        VALIDATION_SET_INPUT_ERROR($fieldname, $label." file type should only ".$rulesname);
                    }
                }
            }
        }
        else{
            VALIDATION_SET_INPUT_ERROR($fieldname, $label." is required.!");
        }
    }
}

if(! function_exists("ARRAY_APPEND_ELEMENT")){
    function ARRAY_APPEND_ELEMENT(array &$array, string $key, $value = null):void{
        /** ==> Void
         * add element to the array
         * $array = specific array
         * $key = $key of the element to be added.
         * $value of the element to be added.
         * Same to ARRAY_ADD_ELEMENT(array $array, string $key, $value)
         */
        if($value==null){
            array_push($array, $key);
        }
        else{
            $array[$key] = $value;
        }
    }
}

if(! function_exists("ARRAY_ADD_ELEMENT")){
    function ARRAY_ADD_ELEMENT(array &$array, string $key, $value=null):void{
        /** ==> Void
         * add element to the array
         * $array = specific array
         * $key = $key of the element to be added.
         * $value of the element to be added.
         * Same to ARRAY_APPEND_DATA(array $array, string $key, $value)
         */
        if($value==null){
            array_push($array, $key);
        }
        else{
            $array[$key] = $value;
        }
    }
}

if(! function_exists("DOWNLOAD_FILE")){
    function DOWNLOAD_FILE(string $file, bool $in_storage = false){
        /** ==> array
         * Summary of DOWNLOAD_FILE
         * CodeYro
         * @param string $file
         * @param bool $in_storage
         * @return array
         */
        $ret = [];
        $f_path = "";
        switch($in_storage){
            case false: $f_path = $file;break;
            case true:  $f_path = STORAGE.$file;break;
        }
        if (file_exists($f_path)) { 
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($f_path).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($f_path));
            ob_clean();
            flush();
            readfile($f_path);
            $ret = ["code" => CY_SUCCESS_CODE, "status" => "Success", "message" => "File downloaded.", "file" => $f_path]; 
        } else {
            $ret = ["code" => 404, "status" => "Failed", "message" => "File not found.!", "file" => $f_path]; 
        }
        return $ret;
    }
}

if(! function_exists("DELETE_FILE")){
    function DELETE_FILE(string $file, bool $in_storage){
        /** ==> array
         * Summary of DELETE_FILE
         * @param string $file
         * @param bool $in_storage
         * @return array
         */
        $ret = [];
        $f_path = "";
        switch($in_storage){
            case false: $f_path = $file;break;
            case true:  $f_path = STORAGE.$file;break;
        }
        
        if (file_exists($f_path)) {
            if (unlink($f_path)) {
                $ret = ["code" => CY_SUCCESS_CODE, "status" => "Success", "message" => "File deleted successfully.", "file" => $f_path];
            } else {
                $ret = ["code" => -1, "status" => "Failed", "message" => "Failed to download file.", "file" => $f_path];
            }
        } else {
            $ret = ["code" => 404, "status" => "Failed", "message" => "File Not found", "file" => $f_path];
        }
        return $ret;
    }
}

if(! function_exists("DELETE_STORAGE_FILE")){
    function DELETE_STORAGE_FILE(string $file):array{
        /** ==> Array
     * Summary of DELETE_STORAGE_FILE
     * @param string $file
     * @return array
     */
        return DELETE_FILE($file, true);
    }
}

if(! function_exists("REQUIRE_FORM_SUBMIT")){
    function REQUIRE_FORM_SUBMIT(string $method){
        /** ==> Void
         * Error when there is no form submitted.
         * @var mixed
         */
        $CY =& get_instance();
        if($method=="post" || $method == "POST"){
            if(empty($CY->POST)){
                die("CodeYRO error: POST submission is required");
            }
        }
        elseif($method=="get" || $method == "GET"){
            if(empty($CY->GET)){
                die("CodeYRO error: GET submission is required");
            }
        }
        else{
            die("CodeYRO error: method name [".$method."] is not valid.! accepts post and get only.");
        }
    }
}

if(! function_exists("REQUIRE_POST")){
    function REQUIRE_POST(){
        /** ==> Void
         * Error when there is no POST form submitted.
         * @var mixed
         */
        REQUIRE_FORM_SUBMIT("POST");
    }
}

if(! function_exists("REQUIRE_GET")){
    function REQUIRE_GET(){
        /** ==> Void
         * Error when there is no GET form submitted.
         * @var mixed
         */
        REQUIRE_FORM_SUBMIT("GET");
        
    }
}

if(! function_exists("CY_GET_LAST_ERROR")){
    function CY_GET_LAST_ERROR(){
        $last_error = error_get_last();
        if($last_error){
            return $last_error;
        }
        else{
            return null;
        }
    }
}

if(! function_exists("DATE_TRANSLATE")){
    function DATE_TRANSLATE($date, $withTime = false){
        /** Date string
         * date to date string format (October 5 1998 12:32:34)
         */
        $date = new DateTime($date);
        $formattedDate = null;
        if($withTime){
            $formattedDate = $date->format('F j Y h:i:s A');
        }
        else{
            $formattedDate = $date->format('F j Y');
        }
        return $formattedDate;
    }
}

if(! function_exists("STRING_CONTAINS")){
    function STRING_CONTAINS(string $parent, $sub){
        /** ==> Boolean
         * check if the parent string contains sub string/array
         * sub may be string or array only
         */
        $ret = false;
        if(is_array($sub)){
            foreach($sub as $s){
                if(strpos($parent, $s) !== false){
                    $ret = true;
                }
            }
        }
        else{
           if(!is_string($sub)){
            die("sub value must be only string or array");
           } 
           else{
            if (strpos($parent, $sub) !== false) {
                $ret = true;
             }
           }
        }
        return $ret;
    }
}

if(! function_exists("STRING_SEPARATE_BY")){
    function STRING_SEPARATE_BY(string $string, string $separator, bool $isArray = false){
        /** ==> String/Array
         * seprated the string with characters
         */
        if($isArray == true){
            return explode($separator, $string);
        }
        else{
            $parts = explode($separator, $string);
            $text = "";
            foreach($parts as $p){
                $text .= $p." ";
            }
            return $text;
        }
    }
}



if(! function_exists("FILES")){
    function FILES(string $inputname = "", string $attr=""){
        /**  Array / File string
         * 
         */
        if(! empty($_FILES)){
            if($inputname=="" || $inputname == null){
                return $_FILES; //👈 Array
            }
            else{
                if($_FILES[$inputname]){
                    if($attr == "" || $attr == null){
                        return $_FILES[$inputname]; //👈 Array
                    }
                    else{
                        return $_FILES[$inputname][$attr]; //👈 String
                    }
                }
                else{
                    die("No ".$inputname." file submitted.!");
                }
            }
        }
        else{
           die("No files submitted.!"); 
        }
    }
}

if(! function_exists("FILE_NAME")){
    function FILE_NAME(string $inputname){
        /**  String
         * return the filename.
         */
        if($inputname == "" || $inputname == null){
            die("Please put inputname for file input.!");
        }
        else{
            return FILES($inputname,"name");
        }
    }
}

if(! function_exists("STRING_UPPERCASE")){
    function STRING_UPPERCASE(string $string):string{
        /** ==> String
         * make string in uppercase
         */
        return strtoupper($string);
    }
}

if(! function_exists("STRING_LOWERCASE")){
    function STRING_LOWERCASE(string $string):string{
        /** ==> String
         * make string in uppercase
         */
        return strtolower($string);
    }
}

if(! function_exists("STRING_CAPITAL_FIRST")){
    function STRING_CAPITAL_FIRST(string $string):string{
        /** ==> String
         * make first letter a capital letter
         */
        return ucfirst($string);
    }
}

if(! function_exists("GET_PREVIOUS_PAGE")){
    function GET_PREVIOUS_PAGE(){
        /** ==> String
         * get the previous page controller name
         */
        $CY =& get_instance();
        $referer_url = $CY->input->server('HTTP_REFERER');
        
        if ($referer_url) {
            $parsed_url = parse_url($referer_url);
            $path = $parsed_url['path'];
    
            $base_url_path = rtrim(parse_url(base_url(), PHP_URL_PATH), '/');
            $controller_method = trim(substr($path, strlen($base_url_path)), '/');
        
            $parts = explode('/', $controller_method);
        
            if (count($parts) == 1) {
                $previous_controller = $parts[0];
                $previous_method = ''; 
                return $previous_controller;
            } elseif (count($parts) >= 2) {
                $previous_controller = $parts[0];
                $previous_method = $parts[1];
                return $previous_controller . "/" . $previous_method;
            } else {
                return "";
            }
        } else {
            return "";
        }  
    }
}

if(! function_exists("VALIDATION_FAILED_BACK")){
    function VALIDATION_FAILED_BACK(){
        /** ==> Void
         *  ==> Redirect to previous page with error message
         * Redirect with error messages
         */
        $CY =& get_instance();
        if ($CY->form_validation->run() == false) {
            $CY->session->set_flashdata('cy_validation_error_1005CodeYro05', VALIDATION_ERROR_LIST());
            CY_REDIRECT(GET_PREVIOUS_PAGE(), [], true);
        }
        else{
            P(["code"=>-1, "status"=>"Error","message"=>"Invalid call, there no failed validation found.!, you can call this function if validation is failed."]);
        }
    }
}

if(! function_exists("CY_BACK_TO_PREVIOUS_PAGE")){
    function CY_BACK_TO_PREVIOUS_PAGE(array $data=[], bool $oldvalue =false, int $delay=0){
        /** ==> Void
         *  Redirect to previous page
         */
        
        CY_REDIRECT(GET_PREVIOUS_PAGE(),$data, $oldvalue, $delay);
    }
}





/**
 * CodeYro
 */
?>