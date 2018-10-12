<?php
require(APPPATH.'/libraries/REST_Controller.php');
class Rest extends REST_Controller
{    	
	public function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Request-Method: *");
		header("Access-Control-Request-Headers: *");
		header("Access-Control-Allow-Headers: Origin, Content-type, X-Auth-Token, Authorization");
	}	
   	 public function userlogin_post()
	{
		$result['status'] = true;
		$result['message'] = "Testing Rest API ";
		$this->response($result, 200);
	}
	public function index_post(){
		echo "hello";
	}
}
	