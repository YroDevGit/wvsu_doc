<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class yrr extends CY_Controller {//Created by: Vendor LENOVO-Name 82TT-LENOVO-JKCN42WW

    public function __construct() {
        parent::__construct();
        /**
         * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
         *  you can load libraries and files here..
         * $this->load->library('session');
         */
    }

    //This is Back_End controller where you can create API's, Please don't delete this comment, you can use this in the future.
    //STATIC API:   /Back_End/index.php/yrr   <== add this to your project/app parent link. 
    //Examples: 
    //LOCAL API: [SERVER]/[APPNAME]/Back_End/index.php/yrr   //Replace the [SERVER]  with your servername and [APPNAME] with you projectname
    //===>LOCAL API Example use: localhost/wvsu_docs/Back_End/index.php/yrr
    //SERVER API: [HOST:PORT]/Back_End/index.php/yrr    //Replace the [HOST:PORT]  with your HOST and PORT, Example localhost:8000
    // ===>SERVER API Example use: localhost:8000/Back_End/index.php/yrr
    //PRODUCTION API: [SITENAME]/Back_End/index.php/yrr 
    //===> PRODUCTION API Example use: https://CodeYRO.com/Back_End/index.php/yrr 
    
    
    public function index()
    {
        //Please remove the sample code, it is just a test code
         $data = ['AppName' => "First CodeYRO project"];
         echo json_encode($data);
         //Remove the comment and replace your own code. thanks: CodeYro
    }

    /**
     * You can add more functions here
     */
}
?>