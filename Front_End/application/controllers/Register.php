<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CY_Controller { //Created by: Vendor LENOVO-Name 82TT-Yro

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
        $data = [
            "title" => "Register page",
            "tab" => CY_OBJECT_VALUE(GET_SESSION("tab"), "home")
        ];
        CY_VIEW("Register", $data);
    }

    public function addUser(){
        REQUIRE_POST();
        $role = GET("r");
        if(! $role){
            die("No role selected");
        }

        SET_VALIDATION("fullname", "Full name", "required|trim");
        SET_VALIDATION("school", "School", "required");
        SET_VALIDATION("email", "Email address", "required|valid_email");
        SET_FILE_VALIDATION("idcard", "ID card", "jpg|jpeg|png", "Images");

        SET_SESSION("tab", strtolower(DECODE($role))=="ict" ? "home" : "admin");

        if(IS_VALIDATION_FAILED()){
            VALIDATION_FAILED_REDIRECT("Register");
        }
        else{
            CY_DB_TRACKER_START();

            $file_upload= UPLOAD_FILE("idcard", CY_AUTO_RENAME_FILE);
            if($file_upload['code'] != CY_SUCCESS){
                die("File not uploaded");
            }

            $data_emp = [
                "fullname" => INPUT("fullname"),
                "school" => DECODE(INPUT("school")),
                "date_added" => date("Y-m-d"),
                "added_by" => 0,
                "stat" => 0, 
                "id_card" => $file_upload['filename']
            ];

            $emp_status = CY_DB_INSERT("emp", $data_emp);
            $emp_id = $emp_status['insert_id'];

            $data_user = [
                "username" => INPUT("email"),
                "password" => "",
                "emp_id" => $emp_id,
                "type" => strtoupper(DECODE($role)),
                "active" => 0,
                "stat" => 0, 
                "code" => $this->form_validation->ShuffleCode()."wvsu-codeyro".$emp_id
            ];
            $user_status = CY_DB_INSERT("users", $data_user);

            if($user_status['code'] == CY_SUCCESS){
                SET_FLASHDATA("register_status", "SUCCESS");
            }
            else{
                SET_FLASHDATA("register_status", $user_status['message']);
            }
            CY_DB_TRACKER_COMPLETE();
            CY_REDIRECT("Register");
        }
        
    }
}
?>