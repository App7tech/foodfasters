<?php
require(APPPATH.'/libraries/REST_Controller.php');
class Home extends REST_Controller
{    	
	public function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Request-Method: *");
		header("Access-Control-Request-Headers: *");
		header("Access-Control-Allow-Headers: Origin, Content-type, X-Auth-Token, Authorization");
		$this->load->model('super_admin/Main_model');
		$this->load->model('api_models/Rest_model');
	}	

	public function main_sliders_post()
	{	
		$data['status'] = true;
		$data['message'] = $this->Main_model->slider_data();
		$path = base_url()."images/sliders/";
		$i = 0;
		foreach ($data['message'] as $slider) {
			$data['message'][$i]['image'] = $path.$slider['image'];
			$i++;
		}
		$this->response($data, 200);
	}

	public function main_banners_post()
	{	
		$data['status'] = true;
		$data['message'] = $this->Main_model->banner_data();
		$path = base_url()."images/banners/";
		$i = 0;
		foreach ($data['message'] as $banner) {
			$data['message'][$i]['image'] = $path.$banner['image'];
			$i++;
		}
		$this->response($data, 200);
	}

	public function get_restaurants_post()
	{
		$data = $this->input->post();
		$msg = "";
		if($data['lat']==''){
			$msg .= "Latitude, ";
		}
		if($data['lon']==''){
			$msg .= "Longitude";
		}  
		if($msg != ""){
			$result['status'] = false;
			$result['message'] = $msg." Missing";
		}else{
			$result['status'] = true;
			$result['message'] = $this->Rest_model->restaurants($data);
		}
		$this->response($result, 200);
	}

	public function get_categories_post(){
		$data = $this->input->post();
		if($data['restaurant_id']==''){
			$result['status'] = false;
			$result['message'] = "Restaurant Id Missing";
		}else{
			$result['status'] = true;
			$result['message'] = $this->Rest_model->categories($data);
		}
		$this->response($result, 200);
	}

	public function get_products_post(){
		$data = $this->input->post();
		if($data['restaurant_id']==''){
			$result['status'] = false;
			$result['message'] = "Restaurant Id Missing";
		}else{
			$result['status'] = true;
			$result['message'] = $this->Rest_model->products($data);
		}
		$this->response($result, 200);
	}

	public function get_category_products_post(){
		$data = $this->input->post();
		$msg = "";
		if($data['restaurant_id']==''){
			$msg .= "Restaurant Id, ";
		}
		if($data['category_id']==''){
			$msg .= "Category Id";
		}  
		if($msg != ""){
			$result['status'] = false;
			$result['message'] = $msg." Missing";
		}else{
			$result['status'] = true;
			$result['message'] = $this->Rest_model->category_products($data);
		}
		$this->response($result, 200);
	}
}
	