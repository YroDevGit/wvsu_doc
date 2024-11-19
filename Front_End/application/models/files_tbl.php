<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class files_tbl extends CY_Model {//created by: Vendor LENOVO-Name 82TT-Yro

        public function __construct() {
            parent::__construct();
            /**
             * in your controller. add this model
             * CY_USE_MODEL('files_tbl');   or   $this->load->model('files_tbl');
             */
        }

        
        public function getTableName(){ //Sample function, you can delete or replace this.
            return "CodeYRO";
        } // to call this function: $this->files_tbl->getName();
    
        
        public function getMyPendigFiles(){
            $school = $this->school_tbl->mySchool();
            $school_id = $school['id'];
            $sql = "SELECT f.id, f.emp_id, f.`from`, e.fullname,f.caption, CONCAT(s.school,' ',s.campus, ' ', s.department)'school', f.doctype, f.details, f.purpose, f.receiving, f.`file`, DATE_FORMAT(f.date_created, '%M %d %Y')'date_created' FROM file f, emp e, school s WHERE (f.emp_id = e.id AND f.school = s.id AND e.school = s.id) or f.school = ? AND f.stat =0 and f.received_by = 0 GROUP BY f.id order by f.date_created DESC";
            $param  = [$school_id];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code'] == CY_SUCCESS_CODE){
                return $result['data'];
            }
        }

        public function getMyFiles(){
            $school = $this->school_tbl->mySchool();
            $school_id = $school['id'];
            $sql = "SELECT f.id, f.emp_id, f.`from`, e.fullname,f.caption, CONCAT(s.school,' ',s.campus,' ', s.department)'school', f.doctype, f.details, f.purpose, f.receiving, f.`file`, DATE_FORMAT(f.date_created, '%M %d %Y')'date_created' FROM file f, emp e, school s WHERE (f.emp_id = e.id AND f.school = s.id AND e.school = s.id) or f.school = ? AND f.stat =0 and f.received_by != 0 GROUP BY f.id order by f.date_created DESC";
            $param  = [$school_id];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code'] == CY_SUCCESS_CODE){
                return $result['data'];
            }
        }

        public function getMyFilesByDate($date){
            $school = $this->school_tbl->mySchool();
            $school_id = $school['id'];
            $sql = "SELECT f.id, f.emp_id, f.`from`, e.fullname,f.caption, CONCAT(s.school,' ',s.campus,' ', s.department)'school', f.doctype, f.details, f.purpose, f.receiving, f.`file`, DATE_FORMAT(f.date_created, '%M %d %Y')'date_created' FROM file f, emp e, school s WHERE (f.emp_id = e.id AND f.school = s.id AND e.school = s.id) or f.school = ? AND f.stat =0 and f.received_by != 0 and f.date_created like '%$date%' GROUP BY f.id order by f.date_created DESC";
            $param  = [$school_id];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code'] == CY_SUCCESS_CODE){
                return $result['data'];
            }
        }

        public function getAllFilesByDate($date){
            $sql = "SELECT f.id, f.emp_id, f.`from`, e.fullname,f.caption, f.received_by, CONCAT(s.school,' ',s.campus,' ', s.department)'school', f.doctype, f.details, f.purpose, f.receiving, f.`file`, DATE_FORMAT(f.date_created, '%M %d %Y')'date_created' FROM file f, emp e, school s WHERE (f.emp_id = e.id AND f.school = s.id AND e.school = s.id) or f.stat =0 and f.date_created like '%$date%' GROUP BY f.id order by f.date_created DESC;";
            $result = CY_DB_SETQUERY($sql);
            if($result['code'] == CY_SUCCESS_CODE){
                return $result['data'];
            }
        }

        public function getAllFiles(){
            $sql = "SELECT f.id, f.emp_id, f.`from`, e.fullname,f.caption, f.received_by, CONCAT(s.school,' ',s.campus,' ', s.department)'school', f.doctype, f.details, f.purpose, f.receiving, f.`file`, DATE_FORMAT(f.date_created, '%M %d %Y')'date_created' FROM file f, emp e, school s WHERE (f.emp_id = e.id AND f.school = s.id AND e.school = s.id) or f.stat =0 GROUP BY f.id order by f.date_created DESC;";
            $result = CY_DB_SETQUERY($sql);
            if($result['code'] == CY_SUCCESS_CODE){
                return $result['data'];
            }
        }

        public function myFilesSent(){
            $sql = "SELECT f.id, f.emp_id, f.received_by, f.caption, f.doctype, f.details, f.purpose, f.`file`, f.date_created, s.school, s.campus, s.department , s.full_name, DATE_FORMAT(f.date_received, '%M %d %Y %h:%i %p') as 'date_received'  FROM school s, file f WHERE f.school = s.id AND f.stat =0 AND f.emp_id = ?";
            $param = [GET_LOGIN_DATA("emp_id")];
            $result = CY_DB_SETQUERY($sql, $param);
            SET_SESSION("LASTQUERY1", CY_DB_LAST_QUERY());
            if($result['code']==CY_SUCCESS){
                return $result['data'];
            }
            else{
                return [];
            }
        }

        public function getFileInfo($fileid=0){
            $sql = "select * from file where id = ?";
            $param = [$fileid];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code']==CY_SUCCESS){
                return $result['first_row'];
            }
            
        }

        public function getMyDocuments(){
            $sql = "select * from myfile where stat = 0 and emp_id = ?";
            $param = [GET_LOGIN_DATA("emp_id")];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code']==CY_SUCCESS){
                return $result['data'];
            }
        } 

        public function getPublicFiles(){
            $sql = "SELECT * FROM myfile where privacy = 0 and stat = 0";
            $result = CY_DB_SETQUERY($sql);
            if($result['code']==CY_SUCCESS){
                return $result['data'];
            }
        }

        public function getRegistry($id){
            $sql = "select * from registry where school = ? order by date_received desc";
            $param = [$this->EMPDATA['school']];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code']==SUCCESS_CODE){
                return $result['data'];
            }
        }






        

    }
?>