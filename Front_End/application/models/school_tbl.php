<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class school_tbl extends CY_Model {//created by: Vendor LENOVO-Name 82TT-Yro

        public function __construct() {
            parent::__construct();
            /**
             * in your controller. add this model
             * CY_USE_MODEL('school_tbl');   or   $this->load->model('school_tbl');
             */
        }

        
        public function getTableName(){ //Sample function, you can delete or replace this.
            return "CodeYRO";
        } // to call this function: $this->school_tbl->getName();
    
        public function mySchool($column=""){
            $emp_id = GET_LOGIN_DATA("emp_id");
            $my_info = $this->emp_tbl->getMyInfo($emp_id);
            $my_school = $my_info["school"];

            $sql = "select * from school where id = ? and stat = 0";
            $param = [$my_school];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code']==CY_SUCCESS){
                if($column == "" || $column == null){
                    return $result['first_row'];
                }
                else{
                    return $result['first_row'][$column];
                }
            }
        }

        public function getAll($includeMySchool=true){
            $sql = "select * from school where stat = 0";
            $param = [];
            if($includeMySchool==false){
                $sql = "select * from school where stat = 0 and id != ?";
                $param = [$this->EMPDATA['school']];
            }
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code'] ==  CY_SUCCESS_CODE){
                return $result['data'];
            }
        }

        public function getAllSchools(){
            $sql = "select * from school where stat = 0";
            $result = CY_DB_SETQUERY($sql);
            if($result['code'] ==  CY_SUCCESS_CODE){
                return $result['data'];
            }
        }

        
        
        //add functions here...






        

    }
?>