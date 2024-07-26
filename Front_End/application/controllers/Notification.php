<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends CY_Controller { //Created by: Vendor LENOVO-Name 82TT-Yro

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
        /**
         * index() function is a class main function.
         * Example: when you call Notification controller, it will find and read the index() function
         * You can add view here to display front_end view
         * $this->load->view('welcome_message'); // will display welcome_message.php
         */
        //Remove sample code: echo "Hello world - CodeYRO";
        echo "Hello world - CodeYRO";
        //This is just a sample text, you can remove comments now.
    }

    
}
?>