<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Home_model');
	}

	public function index(){
		$this->load->view('home_view');
	}
	
	public function restaurants(){
		$this->load->view('restaurants_view');
	}

	function display_res(){
		$post = $this->input->post();
		$this->load->model('User_model');
		if($restaurant['rest'] = $this->User_model->user_res($post)){

				$this->load->view('restaurants_view',$restaurant);
		}else{
			$this->session->set_userdata('onload_status',true);
			// print_r($restaurant);exit();
			$err = 'something went wrong.';
				$this->session->set_flashdata('login_error', $err);
				$this->load->view('restaurants_view');
		}
	}

	public function menu(){
		$this->load->view('menu_view');
	}

	public function contact(){
		$this->load->view('contact');
	}

	public function checkout(){
		$this->load->view('checkout_view');
	}

	public function login(){
		if($this->session->userdata('email') == ''){
			$this->load->view('login_view');
        }else{
        	redirect('Home/index');
        }
	}

	public function register(){
		$this->load->view('register_view');
	}

	public function register_submit(){
		$this->load->model('User_model');
		
		$user = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_registration.email]');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('mobile','Mobile','required|is_unique[user_registration.phone]|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('register_view');
		}else{
			
			
			if($this->User_model->user_register($user)){
				$err = 'Registration success.';
				$this->session->set_flashdata('login_error', $err);
				redirect('Home/login');
			}else{
				$err = 'Registration Fail...Please try again.';
				$this->session->set_flashdata('login_error', $err);
				$this->load->view('register_view');
			}
		}

	}
	public function login_submit(){
		$user_data = $this->input->post();
		$this->load->model('User_model');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('login_view');
		}else{
			$data = $this->User_model->user_login($user_data);
			if($data['status'] == true){
				redirect('Home/index');
			}else{
				$this->session->set_flashdata('login_error', $data['message']);
				$this->load->view('login_view');
			}
		}
	}

	public function profile(){
		$e = $this->session->userdata('email');
		$d = $e[0]['email'];
		$this->load->model('User_model');
		$data['user'] = $this->User_model->profile($d);
		$this->load->view('profile_view',$data);
	}
	public function edit_profile(){
		$e = $this->session->userdata('email');
		$d = $e[0]['email'];
		$this->load->model('User_model');
		$data['user'] = $this->User_model->edit_profile($d);
		$this->load->view('edit_profile',$data);
	}
	public function update_user(){
		$this->load->model('User_model');
		$post = $this->input->post();
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('mobile','Mobile','required|regex_match[/^[0-9]{10}$/]');
		if($this->form_validation->run() == FALSE){
			redirect('Home/edit_profile');
		}else{
			
			
			if($data = $this->User_model->update_profile($post)){
				$err = 'Profile Updated successfully.';
				$this->session->set_flashdata('login_error', $err);
				redirect('Home/profile');
			}else{
				$err = 'Updation Fail...Please try again.';
				$this->session->set_flashdata('login_error', $err);
				redirect('Home/edit_profile');
			}
		}

	}
	public function change_pass(){
		$this->load->view('change_password');
	}
	public function password_update(){
		$this->load->model('User_model');
		$pass = $this->input->post();
		$this->form_validation->set_rules('old_pass','Old Password','required');
		$this->form_validation->set_rules('password','New Password','trim|required|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('change_password');
		}else{
			$msg = $this->User_model->update_pass($pass);

				if($msg['status'] == 1){
					$this->session->set_flashdata('login_error', $msg['message']);
					$this->load->view('home_view');
				}else{
					$this->session->set_flashdata('login_error', $msg['message']);
					$this->load->view('change_password');
				}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("Home/index");
	}

	public function super_admin(){
		if($this->session->userdata('admin_details') == ''){
			$this->load->view('super_admin/login_view');
        }else{
        	redirect('su_dashboard');
        }
	}

	public function super_admin_valid(){
		$this->load->database();
		$post = $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<div>', '</div>');
		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('super_admin/login_view');
        }
        else
        {
            $data = $this->Home_model->super_admin_login($post);
			if($data['status'] == true){
				redirect('su_dashboard');
			}else{
				$this->session->set_flashdata('login_error', $data['message']);
				$this->load->view('super_admin/login_view');
			}
        }
		
	}

	public function seller_admin(){
		$this->load->view('seller_admin/login_view');
	}

	public function seller_admin_valid(){
		$post = $this->input->post();
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		$this->form_validation->set_error_delimiters('<div>', '</div>');
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/login_view');
		}else{
			$data = $this->Home_model->seller_admin_login($post);
			if($data['status'] == true){
				redirect('se_dashboard');
			}else{
				$this->session->set_flashdata('login_error', $data['message']);
				$this->load->view('seller_admin/login_view');
			}
		}
	}

	public function seller_forgot(){
		$this->load->view('seller_admin/forgot_view');
	}
	
	public function seller_forgot_valid(){
		$email = $this->input->post('email');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/forgot_view');
		}else{
			//get token
			$token = $this->Home_model->seller_token($email);
			$link = base_url()."seller_forgot_form/".$token[0]['token'];
			$r_email = $this->session->userdata('email');
			$res_email = $r_email[0]['restaurant_email'];
			$to = $email;
			$message_new= "Please click on below link to reset your password.".$link;
			$subject="Password Reset Link";
			$headers = "From: info@foodfasters.com\r\n";
	   		$headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
	     		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
	     		$this->load->model('seller_admin/Seller_model');
	     		$result = $this->Seller_model->forgot($email);
	     		if($result['status'] == 1)
	     		{
	     			if(mail($to, $subject, $message_new, $headers)){
		     			$err = 'Forgot link sent to your email.';
		     			$this->session->set_flashdata('login_error',$err);
		     			redirect('seller_admin/index');
	     			}else{
		     			$err = "Email sent fail please try again.";
		     			//echo $result['message'];exit();
		     			$this->session->set_flashdata('login_error',$err);
		     			$this->load->view('seller_admin/forgot_view');
	     			}
	     		}else{
	     			//$err = "Not a valid Email.";
	     			//echo $result['message'];exit();
	     			$this->session->set_flashdata('login_error',$result['message']);
	     			$this->load->view('seller_admin/forgot_view');
	     			//redirect('seller_admin/forgot');
	     		}
	 		
		}
	}
	
	public function seller_forgot_form(){
		$data['token'] = $this->uri->segment(2);
		$this->load->view('seller_admin/forgot_form',$data);
	}

	public function seller_forgot_submit(){
		$token = $this->uri->segment(2);
		$post = $this->input->post();
		$this->form_validation->set_rules('password','Password','required|min_length[6]|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|min_length[6]|trim|matches[password]');
		if($this->form_validation->run() == FALSE){
			$this->seller_forgot_form();
		}else{
			$this->load->model('seller_admin/Seller_model');
			if($this->Seller_model->form_submit($post))
			{
				$this->session->set_flashdata('login_error', $data['message']);
				$this->load->view('seller_admin/login_view');
			}else{
				$err = 'Password not updated please try again.';
				$this->session->set_flashdata('login_error', $err);
				$this->load->view('seller_admin/login_view');
			}
			
		}
	}

	
}
