<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Notif_model extends CY_Model {//created by: Vendor LENOVO-Name 82TT-Yro

        public function __construct() {
            parent::__construct();
            /**
             * in your controller. add this model
             * CY_USE_MODEL('Notif_model');   or   $this->load->model('Notif_model');
             */
        }

        
        public function getTableName(){ //Sample function, you can delete or replace this.
            return "CodeYRO";
        } // to call this function: $this->Notif_model->getName();
    
        
        public function getNotif(){
            $notif = [];
            $school_id = $this->EMPDATA['school'];
            $users_sql = "SELECT CONCAT('users') 'type', e.fullname 'name', e.date_requested 'date' FROM emp e, users u WHERE e.id = u.emp_id AND u.`type` != 'ADMIN' AND e.stat = 0 AND e.added_by = 0 AND e.school = 2 AND u.`active` = 0";
            $new_users = CY_SETQUERY($users_sql, [$school_id]);
            SET_SESSION("last_query", CY_DB_LAST_QUERY());
            
            $file_sql = "select CONCAT('files')'type', `from` as 'name', date_created 'date' from file where school = ? and stat = 0 and received_by = 0";
            $new_file = CY_SETQUERY($file_sql, [$school_id]);

            $download_sql = "SELECT CONCAT('downloads')'type', e.fullname 'name', f.date_downloaded 'date' FROM emp e, file_downloads f WHERE e.id = f.emp_id AND e.school = ?";
            $new_download = CY_SETQUERY($download_sql, [$school_id]);
    
            $notif = array_merge($new_users['data'], $new_file['data'], $new_download['data']);
            usort($notif, function($a, $b) {
                return strtotime($b["date"]) - strtotime($a["date"]);
            });
            return $notif;
            
        }






        

    }
?>