<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class emp_tbl extends CY_Model {//created by: Vendor LENOVO-Name 82TT-Yro

        public function __construct() {
            parent::__construct();
            /**
             * in your controller. add this model
             * CY_USE_MODEL('emp_tbl');   or   $this->load->model('emp_tbl');
             */
        }

        
        public function getTableName(){ //Sample function, you can delete or replace this.
            return "CodeYRO";
        } // to call this function: $this->emp_tbl->getName();
    
        
        public function getMyInfo($emp_id){
            $sql = "select * from emp where id = ? and stat = 0";
            $param = [$emp_id];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code']==CY_SUCCESS){
                return $result['first_row'];
            }
        }

        public function getEmployeeById($id, $col=""){
            $sql = "select * from emp where id = ?";
            $param = [$id];
            $result = CY_DB_SETQUERY($sql, $param);
            if($result['code']==CY_SUCCESS){
                if($col=="" || $col==null){
                    return $result['first_row'];
                }
                else{
                    return $result['first_row'][$col];
                }
            }
        }






        

    }
?>