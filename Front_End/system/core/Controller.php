<?php

defined('BASEPATH') OR exit('No direct script access allowed');

define("CY_SUCCESS", 200);
define("CY_SUCCESS_CODE", CY_SUCCESS);
define("SUCCESS_CODE", CY_SUCCESS);
if(! defined("YES")){
	define("YES", true);
}
if(! defined("NO")){
	define("NO", false);
}
include_once SYSTEM_DATA."FE_DATA.php";

#[\AllowDynamicProperties]
class CY_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * CI_Loader
	 *
	 * @var	CI_Loader
	 */
	public $load;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
		$this->load->database();
		$this->load->helper("cyautoloader_helper");
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper("back_end_helper");
		$this->load->helper('security');
		$this->load->helper("form_helper");
		$this->load->helper('string');
		$this->load->library('email');
		$this->load->helper("yro_helper");
		$this->load->helper("fe_sql_helper");
		$this->load->helper("url_helper");
		$this->load->helper("secure_helper");
		$this->load->library('form_validation');
		$this->load->helper('script_helper');
		$this->load->library('blade');
		$this->load->helper('file_manage_helper');
		$this->load->helper('blade_helper');
		if(isset(getallheaders()['Content-Type'])){
			$heading111 = getallheaders()['Content-Type'];
			if($heading111 == "application/json"){
				$this->POST = json_decode($this->input->raw_input_stream, true);
			}
			else{
				$this->POST = (! empty($this->input->post())? $this->input->post() : [] );	
			}
		}

		if(isset(getallheaders()['Content-Type'])){
			$heading111 = getallheaders()['Content-Type'];
			if($heading111 == "application/json"){
				$rawInputCY = file_get_contents('php://input');
				$GETCY = json_decode($rawInputCY, true);
				if(json_last_error() == JSON_ERROR_NONE){
					$this->GET = $GETCY;
				}
				else{
					die("CodeYRO ERROR: ".json_last_error_msg());
				}	
			}
			else{
				$this->GET = $_GET;
			}
		}
		define("POST_ACTIVE", empty($this->POST)? false : true);

		$this->load->helper('cy_helper');
		$this->load->helper('component_helper');
		load_all_models();
		$this->load->helper("auth_helper");
		$this->load->helper("cyemail_helper");
		include_once APPPATH."auto/controller_loader.php";
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
		
	}



	
	

}
