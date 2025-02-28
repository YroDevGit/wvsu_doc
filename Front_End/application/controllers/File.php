<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class File extends CY_Controller { //Created by: Vendor LENOVO-Name 82TT-Yro

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
        AUTHENTICATE_CY_USER(true);
        $role = GET_LOGIN_DATA("type");
        if($role=="ADMIN"){
            CY_REDIRECT("File/Registry");
        }
        if($role=="SUPERADMIN"){
            CY_REDIRECT("Users/AdminPending");
        }
        if($role=="ICT"){
            $page_data = [
                "title" => "Received documents",
                "content" => "received_docs"
            ];
            CY_SHOW_PAGE("Ict", $page_data);
        }
    }


    public function allRegistry(){
        $page_data = [
            "title" => "All Received documents",
            "content" => "allRegistry"
        ];
        CY_SHOW_PAGE("Super", $page_data);
    }


    public function userFiles(){
        $page_data = [
            "title" => "Shared documents",
            "content" => "Schooldocs"
        ];
        CY_SHOW_PAGE("Ict", $page_data);
    }

    public function sentFiles(){
        $data = [
            "title" => "Sent E-Documents",
            "content" => "sent_docu"
        ];
        CY_SHOW_PAGE("Main", $data);
    }

    public function sampp(){
        $name = "tyronemalocon12345678910abcdefghijklmnop";
        $encoded = ENCRYPT($name);
        $decoded = DECODE($encoded);

        echo $name;
        echo "<br>".$decoded;
    }

    public function MyFiles(){
        AUTHENTICATE_CY_USER(true); 
        $param = null;
        if(isset($_GET['arg'])){
            $param = POST('dfilter');
        }
        $page_data = [
            "title" => "Received E-Documents",
            "content" => "MyDocs",
            "param" => $param
        ];
        CY_SHOW_PAGE("Main", $page_data);
    } 

    public function ICTFile(){//For ICT users
        AUTHENTICATE_CY_USER(true);
        $page_data = [
            "title" => "My Documents",
            "content" => "my_docu"
        ];
        CY_SHOW_PAGE("Ict", $page_data);
    } 

    public function deleteMyFile(){
        $id = DECODE(POST("id"));
        $name = POST("name");
        $condition = [
            "file_id" => $id,
            "file_title" => $name
        ];
        $set = [
            "stat" => -1
        ];
        $result = CY_DB_UPDATE("myfile", $condition, $set);
        if($result['code']==CY_SUCCESS){
            JSON_RESPONSE_DATA(CY_SUCCESS, "Success", "data deleted");
        }
        else{
            JSON_RESPONSE_DATA(-1, "Failed", "failed to delete data");
        }
    }

    public function myDocuments(){
        $page_data = [
            "title" => "My Documents/Inventory",
            "content" => "Inventory"
        ];
        CY_SHOW_PAGE("Main", $page_data);
    }

    public function addMyFile(){
        SET_VALIDATION("title", "Title", "required");
        SET_VALIDATION("details", "Details", "required");
        SET_VALIDATION("hash", "Hashtags", "required");
        SET_VALIDATION("privacy", "Privacy", "required");
        SET_FILE_VALIDATION("attfile", "File/Attachment", "pdf|png|jpg|jpeg|docx|xlsx", "Images/Documents");
        if(IS_VALIDATION_FAILED()){
            VALIDATION_FAILED_REDIRECT("File/myDocuments");
        }
        else{
            $file_upload = UPLOAD_FILE("attfile", CY_AUTO_RENAME_FILE);
            if($file_upload['code']==CY_SUCCESS){
                $filename = $file_upload['filename'];

                $data = [
                    "file_title" => POST("title"),
                    "file_details" => POST('details'),
                    "filename" => $filename,
                    "emp_id" => GET_LOGIN_DATA("emp_id"),
                    "school_id" => $this->EMPDATA['school'],
                    "privacy" => DECODE(POST('privacy')),
                    "hash" => POST("hash"),
                    "stat" => "0"
                ];
                $result = CY_DB_INSERT("myfile", $data);
                if($result['code']==CY_SUCCESS){
                    SET_FLASHDATA("file", "SUCCESS");
                    CY_REDIRECT("File/myDocuments");
                }
                else{
                    SET_FLASHDATA("file", "FAILED");
                    CY_REDIRECT("File/myDocuments");
                }
            }
        }
    }

    public function addICTFile(){
        SET_VALIDATION("title", "Title", "required");
        SET_VALIDATION("details", "Details", "required");
        SET_VALIDATION("hash", "Hashtags", "required");
        SET_VALIDATION("privacy", "Privacy", "required");
        SET_FILE_VALIDATION("attfile", "File/Attachment", "pdf|png|jpg|jpeg|docx|xlsx", "Images/Documents");
        if(IS_VALIDATION_FAILED()){
            VALIDATION_FAILED_REDIRECT("File/ICTFile");
        }
        else{
            $file_upload = UPLOAD_FILE("attfile", CY_AUTO_RENAME_FILE);
            if($file_upload['code']==CY_SUCCESS){
                $filename = $file_upload['filename'];

                $data = [
                    "file_title" => POST("title"),
                    "file_details" => POST('details'),
                    "filename" => $filename,
                    "emp_id" => GET_LOGIN_DATA("emp_id"),
                    "school_id" => $this->EMPDATA['school'],
                    "privacy" => DECODE(POST('privacy')),
                    "hash" => POST("hash"),
                    "stat" => "0"
                ];
                $result = CY_DB_INSERT("myfile", $data);
                if($result['code']==CY_SUCCESS){
                    SET_FLASHDATA("file", "SUCCESS");
                    CY_REDIRECT("File/ICTFile");
                }
                else{
                    SET_FLASHDATA("file", "FAILED");
                    CY_REDIRECT("File/ICTFile");
                }
            }
        }
    }


    public function sendFile(){
        SET_VALIDATION("office", "School/Office", "required");
        SET_VALIDATION("caption", "Title/Caption", "required");
        SET_VALIDATION("doctype", "Document type", "required");
        SET_VALIDATION("details", "Details", "required");
        SET_VALIDATION("purpose", "Purpose", "required");
        SET_FILE_VALIDATION("attfile", "Attachment/File", "pdf|png|jpg|jpeg|docx|xlsx", "Images/Documents");
        if(IS_VALIDATION_FAILED()){
            CY_BACK_TO_PREVIOUS_PAGE();
        }
        else{
            $file_upload = UPLOAD_FILE("attfile", CY_AUTO_RENAME_FILE);
            if($file_upload['code']!=CY_SUCCESS){
                $data = ["send_status"=>"failed", "message" => "file failed to upload"]; 
                CY_BACK_TO_PREVIOUS_PAGE($data);
            }
            $filename = $file_upload['filename'];
            $request_data = [
                "emp_id" => GET_LOGIN_DATA("emp_id"),
                "from" => $this->EMPDATA['fullname'],
                "sender_email" => GET_LOGIN_DATA("username"),
                "from_school" => $this->school_tbl->getMySchool("id"),
                "school" => DECODE(INPUT("office")),
                "caption" => INPUT("caption"),
                "doctype" => INPUT("doctype"),
                "details" => INPUT("details"),
                "purpose" => INPUT("purpose"),
                "file" => $filename,
                "date_created" => date("Y-m-d h:i:s"),
                "date_received" => date("Y-m-d h:i:s"),
                "received_by" => 0,
                "stat" => 0
            ];

            $result = CY_DB_INSERT("file", $request_data);
            if($result['code']==CY_SUCCESS){
                $this->logs->addLogs("SEND FILE",$request_data['emp_id']." sent file to school id".$request_data['school']);
                $data = ["send_status"=>"success", "message" => "Document sent"]; 
                CY_BACK_TO_PREVIOUS_PAGE($data);
            }
        }
    }

    
    public function addFile(){
        SET_VALIDATION("from", "From", "required");
        SET_VALIDATION("office", "Office", "required");
        SET_VALIDATION("caption", "Title/Caption", "required");
        SET_VALIDATION("doctype", "Document Type", "required");
        SET_VALIDATION("details", "Details", "required");
        SET_VALIDATION("purpose", "Purpose of submission", "required");
        SET_VALIDATION("myemail", "Sender Email", "valid_email");
        SET_FILE_VALIDATION("attfile", "File/Attachment", "pdf|png|jpg|jpeg|docx|xlsx","Images/Documents");


        if(IS_VALIDATION_FAILED()){
            VALIDATION_FAILED_REDIRECT("Login");
        }
        else{
            $user_id =1; //GET_LOGIN_DATA($id);
            $upload = UPLOAD_FILE("attfile", AUTO_RENAME_FILE);
            if($upload['code']!= CY_SUCCESS_CODE){
                SET_FLASHDATA("file_status", $upload['message']);
            }
            else{
                $data = [
                    "emp_id" => IS_LOGGED_IN() ? GET_LOGIN_DATA("emp_id") : 0,
                    "caption" => INPUT("caption"),
                    "school" => DECODE(INPUT("office")),
                    "from" => POST("from"),
                    "doctype" => INPUT("doctype"),
                    "details" => INPUT("details"),
                    "purpose" => INPUT("purpose"),
                    "receiving" => null,
                    "file" => $upload['filename'],
                    "date_created" => date('Y-m-d'),
                    "stat" => 0,
                    "sender_email" => INPUT("myemail")
                ];
                $result = CY_DB_INSERT("file", $data);
                
                if($result['code']==CY_SUCCESS_CODE){
                    
                    if($upload['code'] == CY_SUCCESS){
                        $this->logs->addLogs("ADD FILE",$data['emp_id']." add new file");
                        SET_FLASHDATA("file_status", "SUCCESS");
                    }
                    else{
                        SET_FLASHDATA("file_status", $upload['message']);
                    }
                }
                else{
                    DELETE_STORAGE_FILE($upload['filename']);
                    SET_FLASHDATA("file_status", $result['message']);
                }
            }
            CY_REDIRECT("LOGIN");
        }
    }


    public function download_doc(){
        $file_id = DECODE(POST('id'));
        $code = $this->file_downloads($file_id);
        JSON_RESPONSE_DATA($code, "STAT", "MESSAGE", ["pcname"=>$this->getPcFullname()]);
    }


    public function acceptFile(){
        $file_id = DECODE(POST("id"));
        $condition = [
            "id" => $file_id
        ];
        $set = [
            "received_by" => GET_LOGIN_DATA("emp_id"),
            "date_received" => date("Y-m-d H:i:s")
        ];
        $result = CY_DB_UPDATE("file", $condition, $set);
        if($result['code'] == CY_SUCCESS_CODE){
            JSON_RESPONSE(["code"=> CY_SUCCESS, "info" => $result]);
        }
        else{
            JSON_RESPONSE(["code"=> -1, "info" => $result]);
        }
    }

    public function ignoreFile(){
        $file_id = DECODE(POST("id"));
        $file_name = POST("filename");

        $file_org = $this->files_tbl->getFileInfo($file_id);
        $condtion = [
            "id" => $file_id,
            "file" => $file_name
        ];
        $result = CY_DB_DELETE("file", $condtion);
        if($result['code'] == CY_SUCCESS_CODE){
            $del_file = ["code"=>CY_SUCCESS];
            if($file_org['copy_of']==0){ //e delete ang original nga file, e stay ang copy nga file.
                //$del_file = DELETE_STORAGE_FILE($file_name);
            }
            if($del_file['code'] == CY_SUCCESS_CODE){
                JSON_RESPONSE(["code"=> CY_SUCCESS, "info" => $result]);
            }
            else{
                P($del_file);
            }
        }
        else{
            JSON_RESPONSE(["code"=> -1, "info" => $result]);
        }
    }

    //Record user that downloads specific file
    public function file_downloads($file_id){
        $sql = "select * from file_downloads where emp_id = ? and file_id = ? and device = ? and school = ?";
        $param = [GET_LOGIN_DATA('emp_id'), $file_id,$this->getPcFullname(), $this->EMPDATA['school']];
        $result = CY_SETQUERY($sql, $param);
        if($result['code'] == CY_SUCCESS_CODE){
            $data = $result['first_row'];
            if(! empty($data)){
                $views = $data['download_times'];
                $condition = [
                    "file_id" => $file_id,
                    "emp_id" =>  GET_LOGIN_DATA('emp_id'),
                    "device" => $this->getPcFullname(),
                    "school" => $this->EMPDATA['school']
                ];
                $set = [
                    "download_times" => $views + 1
                ];
                $update_views = CY_DB_UPDATE("file_downloads", $condition, $set);
                if($update_views['code']==CY_SUCCESS_CODE){
                    return CY_SUCCESS;
                }
                else{
                    return -1;
                }
            }
            else{
                $data = [
                    "emp_id" => GET_LOGIN_DATA("emp_id"),
                    "file_id" => $file_id,
                    "download_times" => 1,
                    "date_downloaded" => date('Y-m-d h:i:s'),
                    "device" => $this->getPcFullname(),
                    "school" => $this->EMPDATA['school']
                ];
                $download_stat = CY_DB_INSERT("file_downloads", $data);
                if($download_stat['code'] == CY_SUCCESS){
                    return CY_SUCCESS;
                }
                else{
                    return -1;
                }
            }
        }
    }

    public function trackView(){
        $file_id = DECODE(INPUT("file_id"));
        $emp_id = GET_LOGIN_DATA("emp_id");
        $sql = "select * from file_viewer where emp_id = ? and file_id = ? and device = ? and school = ?";
        $param = [$emp_id, $file_id, $this->getPcFullname(), $this->EMPDATA['school']];
        $result = CY_DB_SETQUERY($sql, $param);
        if($result['code']==CY_SUCCESS_CODE){
            $data = $result['first_row'];
            if(empty($data)){
                $request = [
                    "emp_id" => $emp_id,
                    "file_id" => $file_id,
                    "date_viewed" => date('Y-m-d H:i:s'),
                    "device" =>$this->getPcFullname(),
                    "school" => $this->EMPDATA['school']
                ];
                $res = CY_DB_INSERT("file_viewer", $request);
                if($res['code']==CY_SUCCESS){
                    JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "VIEW_SUCCESS");
                }
            }
            else{
                $condition = [
                    "emp_id" => $emp_id,
                    "file_id" => $file_id,
                    "device" => $this->getPcFullname(),
                    "school" => $this->EMPDATA['school']
                ];
                $set = [
                    "date_viewed" => date('Y-m-d H:i:s')
                ];
                $res = CY_DB_UPDATE("file_viewer", $condition, $set);
                if($res['code']==CY_SUCCESS){
                    JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "VIEW_SUCCESS");
                }
            }
        }
    }

    public function hideFile(){
        $file_id = DECODE(INPUT("file_id"));
        $sql = "update file set stat = -1 where id = ?";
        $param = [$file_id];
        $result = CY_DB_SETQUERY($sql, $param);
        if($result['code']==CY_SUCCESS){
            JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "File hiden");
        }

    }

    //display users who downloaded the specific file.
    public function getDownloads(){
        $file_id = DECODE(POST("file_id"));
        $sql = "SELECT f.emp_id, e.fullname,f.download_times,f.device, DATE_FORMAT(f.date_downloaded,'%M %d %Y %H:%i%p')'date' FROM file_downloads f, emp e WHERE e.id = f.emp_id and f.file_id = ? and f.emp_id != ?";
        $param = [$file_id, GET_LOGIN_DATA("emp_id")];
        $result = CY_DB_SETQUERY($sql, $param);
        if($result['code']==CY_SUCCESS){
            JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "SUCCESS", $result['data']);
        }
    }

    public function getViews(){
        $file_id = DECODE(POST("file_id"));
        $sql = "SELECT f.id, e.id, e.fullname,f.device, DATE_FORMAT(f.date_viewed, '%M %d %Y %H:%i')'date' FROM file_viewer f, emp e WHERE f.emp_id  = e.id AND f.file_id = ? and f.emp_id != ?";
        $param = [$file_id, GET_LOGIN_DATA("emp_id")];
        $result = CY_DB_SETQUERY($sql, $param);
        if($result['code']==CY_SUCCESS){
            JSON_RESPONSE_DATA(CY_SUCCESS, "SUCCESS", "SUCCESS", $result['data']);
        }
    }

    public function getPcFullname(){
        $all = str_replace("\n", "", php_uname('a'))."";
        $model = str_replace("Manufacturer", "", shell_exec('wmic computersystem get manufacturer'));
        $final = str_replace("\n", "", $model);
        $title = str_replace("\n", "", shell_exec('wmic computersystem get model'));
        return $all." ".$final." ".$title;
    }


    public function publicDocs(){
        $data = [
            "title" => "Public Documents",
            "content" => "public_docs"
        ];
        CY_VIEW_PAGE("Main", $data);
    }

    public function DeptpublicDocs(){
        $data = [
            "title" => "Public Documents",
            "content" => "public_docs"
        ];
        CY_VIEW_PAGE("Ict", $data);
    }

    function Registry(){
        $data = [
            "title" => "Received Documents",
            "content" => "registry"
        ];
        CY_VIEW_PAGE("Main", $data);
    }

    function addRegistry(){
        $_POST['user'] = GET_LOGIN_DATA("user_id");
        $data = $_POST;
        $data['school'] = $this->EMPDATA['school'];
        $result = CY_DB_INSERT("registry", $data);
        if($result['code']==SUCCESS_CODE){
            CY_REDIRECT("File/Registry");
        }else{
            print_r($result);
            exit;
        }
    }

    function deleteRegistry(){
        $id = $_GET['id'];
        $sql = "delete from registry where id = ?";
        $param = [$id];
        $result = CY_SETQUERY($sql, $param);
        if($result['code'] == SUCCESS_CODE){
            CY_REDIRECT("File/Registry");
        }else{
            print_r($result);
        }
    }

    function alldocu(){
        $param = null;
        if(isset($_GET['arg'])){
            $param = POST('dfilter');
        }
        $data = [
            "title" => "All documents",
            "content" => "alldocuments",
            "param" => $param
        ];
         CY_VIEW_PAGE("Super", $data);
    }

    /**
     * You can add more functions here
     */
}
?>