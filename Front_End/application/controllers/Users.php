<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CY_Controller { //Created by: Vendor LENOVO-Name 82TT-Yro

    public function __construct() {
        parent::__construct();
        AUTHENTICATE_CY_USER(true);
        /**
         * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
         *  you can load libraries and files here..
         * $this->load->library('session');
         */
    }
    
    // This is a Front_End controller (Manage User interface and fetch data from Back End to display).

    public function PendingUsers() 
    {
        $data = [
            "title" => "Pending users",
            "content" => "pending_users"
        ];
         CY_VIEW_PAGE("Main", $data);   
    }

    public function AdminPending(){
        $page_data = [
            "title" => "Pending Users",
            "content" => "user_pending"
        ];
        CY_SHOW_PAGE("Super", $page_data);
    }

    public function ActiveUsers(){
        $data = [
            "title" => "Active users",
            "content" => "active_users"
        ];
         CY_VIEW_PAGE("Main", $data); 
    }
   
    public function acceptUser(){
        require_once BASEPATH."libraries/Yros_mail.php";
        $ymail = new Yros_mail();
        $id = DECODE(POST("id"));
        $email = DECODE(POST("email"));
        $condition = ["emp_id" => $id, "stat" => "0"];
        $newpass = CY_INT_CODE(5);
        $set = ["active" => 1, "password"=>$newpass];
        if(! HAS_INTERNET_CONNECTION()){
            JSON_RESPONSE_DATA(1000, "FAILED", "Can't activate user without internet connection.!");
        }
        $result = CY_DB_UPDATE("users", $condition, $set);
        $send_email = $ymail->send_email($email, "Account activated" , "Hello ".$email.", Your account has been activated.<br><br>Username: ".$email."<br>Password: ".$newpass);
        
        //CY_SEND_PLAIN_EMAIL("West Visayas State University", $email, "User activated", "Hello ".$email.", Your account has been activated.<br><br>Username: ".$email."<br>Password: ".$newpass);
        if($send_email['code'] != CY_SUCCESS){
            $this->logs->addLogs("USER DISABLED","user id $id is accepted");
            JSON_RESPONSE($send_email);
        }
        $emp_result = CY_DB_UPDATE("emp", ["id"=>$id], ["added_by" => CY_OBJECT_VALUE(GET_LOGIN_DATA("emp_id"),-1)]);
        if($result['code'] == CY_SUCCESS_CODE && $emp_result['code'] == CY_SUCCESS_CODE && $send_email['code']==CY_SUCCESS_CODE){
            ARRAY_APPEND_ELEMENT($result, "email", $email);
            JSON_RESPONSE($result);
        }
        else{
            JSON_RESPONSE([$result]);
        }
    }

    public function ignoreUser(){
        require_once BASEPATH."libraries/Yros_mail.php";
        $ymail = new Yros_mail();
        $id = DECODE(POST("id"));
        $idcard = DECODE(POST("file"));
        $email = DECODE(POST('email'));
        $condition = ["emp_id" => $id, "stat" => "0"];
        $set = ["active" => 1];
        if(! HAS_INTERNET_CONNECTION()){
            JSON_RESPONSE_DATA(1000, "FAILED", "Can't activate user without internet connection.!");
        }
        $skip = false;
        $file_remove = ["code" => 200];
        if($idcard == "" || $idcard == null){
            $skip = true;
        }
        else{
            $file_remove = DELETE_STORAGE_FILE($idcard);
        }
        if($file_remove['code'] == CY_SUCCESS_CODE || $skip){
            $result = CY_DB_UPDATE("users", $condition, $set);
            if($result['code'] == CY_SUCCESS_CODE){
                $this->logs->addLogs("USER IGNORED","user id $id has been ignored");
                $send_email = $ymail->send_email($email, "User not activated" , "User not activated", "<span style='color:red;'>Im sorry to inform you that your registration request has been ignored</span>");
//$send_email = CY_SEND_PLAIN_EMAIL("West Visayas State University", $email, "User not activated", "<span style='color:red;'>Im sorry to inform you that your registration request has been ignored</span>");
                ARRAY_APPEND_ELEMENT($result, "email", $email);
                JSON_RESPONSE($result);
            }
            else{
                JSON_RESPONSE([$result]);
            }
        }
        else{
            JSON_RESPONSE($file_remove);
        }
    }

    function disableUser(){
        $id = DECODE($_GET['id']);
        CY_DB_UPDATE("users", ['user_id'=>$id], ['active'=>0]);
        SET_FLASHDATA("disable", "SUCCESS");
        $this->logs->addLogs("USER DISABLED","user id $id is disabled");
        CY_REDIRECT("users/activeUsers");
    }
    /**
     * You can add more functions here
     */
}
?>