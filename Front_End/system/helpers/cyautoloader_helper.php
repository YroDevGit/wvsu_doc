<?php
/**
 * CodeYRO
 * to automatically load the models.
 * no need to load it manually
 */
 if(! function_exists("load_all_models")){
    function load_all_models() {
        $model_path = APPPATH . 'models/';
        $models = glob($model_path . '*.php');
        $CY =& get_instance();
    
        foreach ($models as $model) {
            $model_name = basename($model, '.php');
            if ($model_name != 'MY_Model') {
                $CY->load->model($model_name);
            }
        }
    
    }
 }


?>