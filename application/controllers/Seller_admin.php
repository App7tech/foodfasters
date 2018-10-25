<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->model('seller_admin/Seller_model');
		if($this->session->userdata('email') == ''){
			$this->session->set_flashdata('login_error','Please Login to Continue!');
			redirect('seller_admin');
		}
	}

	public function dashboard(){
		$this->load->view('seller_admin/dashboard');	
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
		redirect("seller_admin");
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
//======================================Product Functionality================================================
	public function productCategories()
	{
		$data['categoryArray']=$this->Seller_model->getAllCategories();
		$this->load->view('seller_admin/product_categories',$data);
	}
	
	public function addNewCategory()
	{
		$this->form_validation->set_rules('category_name','Category Name','required|is_unique[category.category_name]');
		$this->form_validation->set_error_delimiters('<span class="text-danger"><b>','</b></span>');
		if($this->form_validation->run() == FALSE){
			$this->productCategories();
		}else{
			$statusArray=$this->Seller_model->addNewCategory();
			if($statusArray['status']){
				//true
				$this->session->set_flashdata('cat_err',"Category Added Successfully!");
				redirect('se_categories');
			}else{
				//false
				$this->session->set_flashdata('cat_err',"Failed to Add Category");
				$this->productCategories();
			}
		}
	}

	public function delCategory(){
		$status = $this->uri->segment(3);
		$catId = $this->uri->segment(4);
		if($this->Seller_model->deleteCategory($status,$catId)){
			//true
			$this->session->set_flashdata('cat_err',"Category Deleted Successfully!");
			redirect('se_categories');
		}else{
			//false
			$this->session->set_flashdata('cat_err',"Failed to Delete Category");
			$this->productCategories();
		}
	}

	public function productList()
	{
		$data['productArray']=$this->Seller_model->getAllProducts();
		$this->load->view('seller_admin/product_list',$data);
	}
	
	public function addProduct()
	{	
		$data['cat'] = $this->Seller_model->getAllCategories();
		$data['page']="Add Product";
		$this->load->view('seller_admin/add_product',$data);
	}
	
	public function addNewProduct()
	{
		$this->form_validation->set_rules('product_name','Product Name','required');
		$this->form_validation->set_rules('product_description','Product Description','required');
		$this->form_validation->set_rules('price','Price','required|numeric');
		$this->form_validation->set_rules('selling_price','Selling Price','required|numeric');
		$this->form_validation->set_rules('category','Category','required');
		
		if (empty($_FILES['product_image']['name']))
		{
			$this->form_validation->set_rules('product_image','Product Image','required');
		}
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/add_product');
		}else{		
			$statusArray=$this->Seller_model->addNewProduct();
			//print_r($statusArray);
			if($statusArray['status'])
			{
				redirect('Seller_admin/productList');
			}
		}
	}
	
	public function editProduct($prodId)
	{
		$data['page']="Edit Product";
		$data['productData']=$this->Seller_model->getProductById($prodId);
		$this->load->view('seller_admin/edit_product',$data);
	}
	
	public function updateProduct($prodId)
	{
		$this->form_validation->set_rules('product_name','Product Name','required');
		$this->form_validation->set_rules('product_description','Product Description','required');
		$this->form_validation->set_rules('price','Price','required|numeric');
		$this->form_validation->set_rules('selling_price','Selling Price','required|numeric');
		$this->form_validation->set_rules('category','Category','required');
		
		if (empty($_FILES['product_image']['name']))
		{
			$this->form_validation->set_rules('product_image','Product Image','required');
		}
		if($this->form_validation->run() == FALSE){
			$this->load->view('seller_admin/edit_product');
		}else{	
			echo $this->Seller_model->updateProduct($prodId);
		}
	}	
	
	public function deleteProduct($prodId)
	{
		$status= $this->Seller_model->deleteProduct($prodId);
		if($status)
		{
			redirect('Seller_admin/productList');
		}
	}
}
