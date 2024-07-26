<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CY_Controller { //Created by: Vendor LENOVO-Name 82TT-Yro

    public function __construct() {
        parent::__construct();
        AUTHENTICATE_CY_USER(true);
        /**
         * CodeYRO PHP framework inspired to Laravel and CodeIgniter.
         *  you can load libraries and files here..
         * $this->load->library('session');
         */
    }
    
    // This is a Front_End controller (Manage User interface and fetch data from Back End to display).

    public function index() 
    {
        $data=[
            "title" => "Admin Dashboard",
            "content" => "Dashboard"
        ];
        CY_VIEW_PAGE("Super", $data);
    }

    /**
     * You can add more functions here
     */
}
?>