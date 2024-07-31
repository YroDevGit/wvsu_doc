<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Schools extends CY_Controller { //Created by: Vendor LENOVO-Name 82TT-Yro

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

    public function AllSchools() 
    {
       $data = [
        "title" => "All Schools",
        "content" => "schools"
       ];
       CY_VIEW_PAGE("Super", $data);
    }

    public function add(){
        SET_VALIDATION("school", "School", "required");
        SET_VALIDATION("campus", "Campus", "required");
        SET_VALIDATION("full_name", "Complete name", "required");
        SET_VALIDATION("school_code", "School number", "required");
        SET_VALIDATION("address", "Address", "required");
        SET_VALIDATION("department", "Department", "required");
        if(IS_VALIDATION_FAILED()){
           VALIDATION_FAILED_REDIRECT("Schools/AllSchools");
        }
        else{
            $data = POST_DATA();
            ARRAY_APPEND_ELEMENT($data, "date_added", date("Y-m-d H:i:s"));
            $result = CY_DB_INSERT("school", $data);
            if($result['code']==CY_SUCCESS){
               CY_REDIRECT("Schools/AllSchools",["status"=>"SUCCESS"]);
            }
            else{
                CY_REDIRECT("Schools/AllSchools",["status"=>"FAILED", "message"=>$result['message']]);
            }
        }
    }

    /**
     * You can add more functions here
     */
}
?>