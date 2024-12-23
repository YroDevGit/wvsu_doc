<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class users_tbl extends CY_Model {//created by: Vendor LENOVO-Name 82TT-Yro

        public function __construct() {
            parent::__construct();
            /**
             * in your controller. add this model
             * CY_USE_MODEL('users_tbl');   or   $this->load->model('users_tbl');
             */
        }

        
        public function getTableName(){ //Sample function, you can delete or replace this.
            return "CodeYRO";
        } // to call this function: $this->users_tbl->getName();
    
        
        public function showPendingUsers(){
            $school_id = $this->EMPDATA['school'];
            $sql = "SELECT e.id, u.user_id, e.fullname, s.school, s.campus, u.username, e.contact, e.id_card, e.profile, e.date_requested FROM users u, emp e, school s WHERE e.id = u.emp_id AND e.school = s.id AND e.school = ? AND e.stat = 0 AND u.stat = 0 AND u.`active` = 0 AND u.`type` != 'ADMIN' GROUP BY e.id";
            $param = [$school_id];
            $result = CY_DB_SETQUERY($sql,$param);
            if($result['code'] == CY_SUCCESS_CODE){
                return $result['data'];
            }
            else{
                die("error");
            }
        }

        public function showActiveUsers(){
            $school_id = $this->EMPDATA['school'];
            $sql = "SELECT e.id, u.user_id, e.fullname, s.school, s.campus, u.username, e.contact, e.id_card, e.profile, e.date_requested FROM users u, emp e, school s WHERE e.id = u.emp_id AND e.school = s.id AND e.school = ? AND e.stat = 0 AND u.stat = 0 AND u.`active` = 1 AND u.`type` != 'ADMIN' GROUP BY e.id";
            $param = [$school_id];
            $result = CY_DB_SETQUERY($sql,$param);
            if($result['code'] == CY_SUCCESS_CODE){
                return $result['data'];
            }
            else{
                die("error");
            }
        }


        public function getUserdata($userid){
            $sql = "select * from users where emp_id = ?";
            $param = [$userid];
            $result = CY_SETQUERY($sql, $param);
            if($result['code']==CY_SUCCESS){
                return $result['first_row'];
            }
            else{
                return [];
            }
        }

        //For super admin
        public function showAllPendingAdmin(){
            $sql = "SELECT e.id'emp_id', u.user_id,s.id'school_id', e.fullname, e.contact,s.department, e.id_card, u.username, s.school, s.campus, DATE_FORMAT(e.date_requested, '%M %d %Y %H:%i')'date' FROM users u, emp e, school s WHERE u.emp_id = e.id AND e.school = s.id AND e.stat =0 AND u.stat = 0 AND u.`active` = 0 AND u.`type` = 'ADMIN' GROUP BY e.id ORDER BY e.date_requested";
            $result = CY_DB_SETQUERY($sql);
            if($result['code']==CY_SUCCESS){
                return $result['data'];
            }
        }
        public function showAllAcceptedAdmin(){
            $sql = "SELECT e.id'emp_id', u.user_id,s.id'school_id', e.fullname,s.department, e.contact, e.id_card, u.username, s.school, s.campus, DATE_FORMAT(e.date_requested, '%M %d %Y %H:%i')'date' FROM users u, emp e, school s WHERE u.emp_id = e.id AND e.school = s.id AND e.stat =0 AND u.stat = 0 AND u.`active` = 1 AND u.`type` = 'ADMIN' GROUP BY e.id ORDER BY e.date_requested";
            $result = CY_DB_SETQUERY($sql);
            if($result['code']==CY_SUCCESS){
                return $result['data'];
            }
        }

        

    }
?>