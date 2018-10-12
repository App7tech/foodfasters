<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_admin extends CI_Controller {
	public function __construct(){
        parent::__construct();
	$this->load->database();
	$this->load->helper('url');
	$this->load->library('session');
	$this->load->helper('form');
        //check login logic here 
        
	        
    	}
	public function index(){
		if($this->session->userdata('email') == ''){
			$this->load->view('seller_admin/login_view');
		}else{
			
			redirect('Seller_admin/dashboard');
		}
	
	}
	public function dashboard(){
		$this->load->view('seller_admin/dashboard');	
	}
	
	public function login_valid(){
	
	$post = $this->input->post();
	$this->form_validation->set_rules('email','Email','required|valid_email');
	$this->form_validation->set_rules('password','Password','required|min_length[6]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/login_view');
		}else{
		echo 'ok';
			$this->load->model('seller_admin/Seller_model');
			$data = $this->Seller_model->login($post);
			if($data['status'] == true){
				redirect('Seller_admin/dashboard');
			}else{
				$this->session->set_flashdata('login_error', $data['message']);
				$this->load->view('seller_admin/login_view');
			}
		}
	}
	public function restaurant_view(){
		$r_email = $this->session->userdata('email');
		$res_email = $r_email[0]['restaurant_email'];
		$this->load->model('seller_admin/Seller_model');
		$data['rest_data'] = $this->Seller_model->profile($res_email);
		$this->load->view('seller_admin/profile',$data);
	}
	public function logout(){
	$this->session->sess_destroy();
		redirect("Seller_admin/index");
	}
	
	public function change_password(){
	$this->load->view('seller_admin/change_password');
	}
	public function update_password(){
		$this->load->model('seller_admin/Seller_model');
		$r_email = $this->session->userdata('email');
		$res_email = $r_email[0]['restaurant_email'];
		$post  = $this->input->post();
		$this->form_validation->set_rules('old_password','Old Password','required');
		$this->form_validation->set_rules('password','Password','required|min_length[6]');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|min_length[6]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/change_password');
		}else{
			$data = $this->Seller_model->update_password($post);
			//print_r($data);exit();
			if($this->Seller_model->update_password($post)){
			$this->session->set_flashdata('login_error', $data['message']);
			$this->load->view('seller_admin/change_password');
			}else{
			$this->session->set_flashdata('login_error', $data['message']);
			$this->load->view('seller_admin/change_password');
			}
		}
	}
	public function forgot(){
		$this->load->view('seller_admin/forgot_view');
	}
	public function forgot_valid(){
	$email = $this->input->post('email');
	$link = "http://choteenews.com/foodfasters/Seller_admin/forgot_form/".base64_encode($email);
	$this->form_validation->set_rules('email','Email','required|valid_email');
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/forgot_view');
		}else{
			$r_email = $this->session->userdata('email');
			$res_email = $r_email[0]['restaurant_email'];
			$to = $email;
			$message_new= "Please click onbelow link to reset your password.".$link;
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
		     			$err = "Emailsent fail please try again.";
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
	public function forgot_form(){
		$this->load->view('seller_admin/forgot_form');
	}
	public function forgot_submit(){
		$lemail = $this->uri->segment(5);
		echo $lemail;exit();
		$post = $this->input->post();
		$this->form_validation->set_rules('password','Password','required|min_length[6]|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|min_length[6]|trim|matches[password]');
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/forgot_form');
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
