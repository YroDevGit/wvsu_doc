<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class codeyro extends CY_Controller {

	
	public function index()
	{ 
		CY_VIEW('welcome_message');	
	}

	public function NotAuthenticated(){
        //Print Authentication error message, you can replace it with CY_VIEW();
        P("<span style='color:red;font-size:18px;'>User is not authenticated.!</span> <br><br><a href='/'>Back to homepage</a>");
    }
    public function RestrictUserRoles(){
        //Print Roles error message, you can replace it with CY_VIEW();
        P("<span style='color:red;'>You are not able to access this page</span>");
    }
}
