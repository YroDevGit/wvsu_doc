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

    public function sendMail(){
        $result = CY_SEND_PLAIN_EMAIL("Tyrone", "tyronemalocon@gmail.com", "Subject", "content");
        P($result);
    }

    

    public function Auth(){
        REQUIRE_POST();
        SET_VALIDATION("username", "Username", "required");
        SET_VALIDATION("password", "Password", "required");
        SET_VALIDATION("options", "Role", "required");
        if(IS_VALIDATION_FAILED()){
            VALIDATION_FAILED_BACK();
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
                        $this->logs->addLogs("USER LOGIN", "USER ID: ".$data['user_id']." has been logged in");
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

    public function sendOTP(){
        $sql = "select * from users where username = ?";
        $email = INPUT("username");
        $param = [$email];
        $result = CY_DB_SETQUERY($sql, $param);
        if($result['code']==CY_SUCCESS){
            $frow = $result['first_row'];
            if(empty($frow)){
                JSON_RESPONSE_DATA(-1, "FAILED", "Account not found.!", $frow);
            }
            else{
                if($frow['active']==1){
                    $code = CY_INT_CODE(5);
                    $email_result = CY_SEND_PLAIN_EMAIL("WVSU login OTP", $email,"LOGIN OTP", "Your login OTP code is: ".$code);
                    if($email_result['code']!=CY_SUCCESS){
                        JSON_RESPONSE_DATA(-5, "FAILED", $email_result['message'], $email_result);
                    }
                    $this->addOTP($email, $code);
                    JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "Login success.!", $frow);
                }
                else{
                    JSON_RESPONSE_DATA(101, "INACTIVE", "Account is not active, please contact administrator.!");
                }  
            }
        }
    }

    public function addOTP($email, $code){
        $sql = "delete from otp_code where email_address = ?";
        $param = [$email];
        CY_DB_SETQUERY($sql,$param);
        $data = [
            "email_address" => $email,
            "otp_code" => $code,
            "stat" => 0,
            "otp_date" => date("Y-m-d h:i:s")
        ];
        $result = CY_DB_INSERT("otp_code", $data);
        if($result['code'] == CY_SUCCESS){
            return $result;
        }
    }

    public function submitOTP(){
        $email = INPUT("username");
        $code = INPUT("otp");
        $sql = "select * from otp_code where email_address = ? and otp_code = ?";
        $param = [$email, $code];
        $result = CY_SETQUERY($sql, $param);
        if($result['code']==CY_SUCCESS){
            $frow = $result['first_row'];
            if(empty($frow)){
                JSON_RESPONSE_DATA(-1, "FAILED", "Invalid OTP.!", $frow);
            }
            else{
                $query = "select * from users where username = ?";
                $dt = [$email];
                $data = CY_SETQUERY($query, $dt);
                if($data['code']==CY_SUCCESS){
                    $data_first_row = $data['first_row'];
                    SET_LOGIN(true, $data_first_row);
                    JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "OTP authentication success.!", $frow);
                }
                else{
                    JSON_RESPONSE_DATA(101, "FAILED", "ERROR CODE1");
                }
            }
            
        }
        else{
            JSON_RESPONSE_DATA(101, "FAILED", "ERROR CODE2");
        }
    }

    public function scann(){
        $code = DECODE(POST('code'));
        $sql = "select * from users where code = ? and stat = 0  and active = 1";
        $param = [$code];
        $result = CY_DB_SETQUERY($sql, $param);
        if($result['code']==CY_SUCCESS){
            $data = $result['first_row'];
            if(empty($data)){
                JSON_RESPONSE_DATA(-1, "Failed", "Failed");
            }
            else{
                SET_LOGIN(true, $data);
                JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "Login Success");
            }
        }
        
    }

    public function LoginSuccess(){
        CY_REDIRECT("File");
    }

    public function AuthLogout(){
        $id=GET_LOGIN_DATA('user_id');
        $this->logs->addLogs("USER LOGIN", "USERID: ".$id." has been logged out");
        LOG_OUT();
        CY_REDIRECT("Login");
    }

    /**
     * You can add more functions here
     */
}
?>