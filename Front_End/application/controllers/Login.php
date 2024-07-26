<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CY_Controller { //Created by: Vendor LENOVO-Name 82TT-Yro

    public function __construct() {
        parent::__construct();
        AUTHENTICATE_CY_USER(false);
        /**
         * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
         *  you can load libraries and files here..
         * $this->load->library('session');
         */
    }
    
    // This is a Front_End controller (Manage User interface and fetch data from Back End to display).

    public function index() 
    {
        if(USER_HAS_LOGGED_IN()){
            CY_REDIRECT("File");
        }
        else{
            $data['title'] =  "Login";
            CY_VIEW("Login", $data);
        }
    }

    

    public function Auth(){
        REQUIRE_POST();
        SET_VALIDATION("username", "Username", "required");
        SET_VALIDATION("password", "Password", "required");
        SET_VALIDATION("options", "Role", "required");
        if(IS_VALIDATION_FAILED()){
            VALIDATION_FAILED_REDIRECT("Login");
        }
        else{
            $sql = "select * from users where username = ? and password = ? and type = ? and stat = 0";
            $param = [
                INPUT("username"),
                INPUT("password"),
                DECODE(INPUT("options"))
            ];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code'] == CY_SUCCESS_CODE){
                $data = $result['first_row'];
                if(empty($data)){
                    SET_FLASHDATA("status", "Account not found.!");
                }
                else{
                    if($data['active'] == 1){
                        SET_LOGIN(true, $data);
                        SET_FLASHDATA("status", "SUCCESS");
                    }
                    else{
                        SET_FLASHDATA("status", "INACTIVE");
                    } 
                }
            }
            else{
                SET_FLASHDATA("status", $result['message']);
            } 
            CY_REDIRECT("Login",[],true);
        }
    }

    public function LoginSuccess(){
        CY_REDIRECT("File");
    }

    public function AuthLogout(){
        LOG_OUT();
        CY_REDIRECT("Login");
    }

    /**
     * You can add more functions here
     */
}
?>