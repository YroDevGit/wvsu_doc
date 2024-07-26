<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once  'IgniteData/vendor/autoload.php';
/** 
 * CodeYRO blade...
 */
use Coolpraz\PhpBlade\PhpBlade;
class CI_Blade {


    public function CODEYRO_VIEW($view, array $data = []){
        $views = APPPATH. '/views';
        $cache = APPPATH . '/cache';
    
        $blade = new PhpBlade($views, $cache);
    
        echo $blade->view()->make($view, $data);
    }
}
?>