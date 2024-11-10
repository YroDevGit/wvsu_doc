<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class logs extends CY_Model {//created by: Vendor LENOVO-Name 82TT-LENOVO-JKCN42WW

        public function __construct() {
            parent::__construct();
            /**
             * in your controller. add this model
             * CY_USE_MODEL('logs');   or   $this->load->model('logs');
             */
        }

        
        public function getTableName(){ //Sample function, you can delete or replace this.
            return "CodeYRO";
        } // to call this function: $this->logs->getName();
    
        
        public function addLogs($category, $message){
            $param['category']=$category;
            $param['message'] = $message;
            CY_DB_INSERT("activity",$param);
        }






        

    }
?>