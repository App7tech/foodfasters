<?php
require(APPPATH.'/libraries/REST_Controller.php');
class User extends REST_Controller
{    	
	public function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Request-Method: *");
		header("Access-Control-Request-Headers: *");
		header("Access-Control-Allow-Headers: Origin, Content-type, X-Auth-Token, Authorization");
		$this->load->model('User_model');
	}	
   	
   	public function user_login_post()
	{	
		echo "string";
		$user_data = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run() == FALSE){
			$data1['status'] = false;
			if(form_error('email')){
				$data1['message'] .= form_error('email');
			}
			if(form_error('password')){
				$data1['message'] .= " ".form_error('password');
			}
		}else{
			$data1 = $this->User_model->user_login($user_data);
		}
		$this->response($data1, 200);
	}

	public function user_register_post()
	{
		$user = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_registration.email]');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('mobile','Mobile','required|is_unique[user_registration.phone]|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_error_delimiters('', '');
		if($this->form_validation->run() == FALSE){
			$data1['status'] = false;
			if(form_error('email')){
				$data1['message'] .= form_error('email');
			}
			if(form_error('name')){
				$data1['message'] .= " ".form_error('name');
			}
			if(form_error('mobile')){
				$data1['message'] .= " ".form_error('mobile');
			}
			if(form_error('password')){
				$data1['message'] .= " ".form_error('password');
			}
			if(form_error('cpassword')){
				$data1['message'] .= " ".form_error('cpassword');
			}
		}else{
			if($this->User_model->user_register($user)){
				$data1['status'] = true;
				$data1['message'] = 'Registration success.';
			}else{
				$data1['status'] = false;
				$data1['message'] = 'Registration Fail...Please try again.';
			}
		}
		$this->response($data1,200);
	}

	public function index_post(){
		echo "hello";
	}
}
	