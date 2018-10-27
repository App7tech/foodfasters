<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//check login logic here 
		if($this->session->userdata('admin_details') == ''){
			$this->session->set_flashdata('login_error','Please Login to Continue!');
			redirect('super_admin');
		}
	    $this->load->helper('form');
	    $this->load->model('super_admin/Main_model');
	}

	public function dashboard(){
		$this->load->view('super_admin/dashboard');	
	}

	public function restaurant_add(){
		$this->load->view('super_admin/restaurant_add_view');
	}

	public function restaurant_add_submit(){
		$user = $this->input->post();
		$this->load->database();
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('mobile','Mobile','required|regex_match[/^[0-9]{10}$/]|is_unique[restaurant_add.mobile]');
		$this->form_validation->set_rules('restaurant_name','Restaurant Name','required');
		$this->form_validation->set_rules('restaurant_email', 'Restaurant Email', 'required|valid_email|is_unique[restaurant_add.restaurant_email]');
		if (empty($_FILES['restaurant_img']['name']))
		{
			$this->form_validation->set_rules('restaurant_img','Image','required');
		}
		// $this->form_validation->set_rules('restaurant_img','Image','required');
		$this->form_validation->set_rules('restaurant_address','Address','required');
		$this->form_validation->set_rules('restaurant_city','City','required');
		$this->form_validation->set_rules('restaurant_state','State','required');
		$this->form_validation->set_rules('latitude','latitude','required|numeric');
		$this->form_validation->set_rules('longitude','longitude','required|numeric');
		$this->form_validation->set_rules('days[]', 'Days', 'required');
		$this->form_validation->set_rules('s_time','Opening Time','required');
		$this->form_validation->set_rules('e_time','End Time','required');
		$this->form_validation->set_error_delimiters('<div>','</div>');
		if($this->form_validation->run() == FALSE){
			$this->load->view('super_admin/restaurant_add_view');
		}else{
			 //Check whether user upload picture
            if(!empty($_FILES['restaurant_img']['name'])){
                $config['upload_path'] = './images/restaurants';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['restaurant_img']['name'];
                $config['encrypt_name'] = TRUE;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('restaurant_img')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            $user['picture'] = $picture;
			
			$result = $this->Main_model->restaurant_add($user);
			if($result['status']){
				$this->session->set_flashdata('res_reg_err', $result['message']);
				$this->load->view('super_admin/all_restaurants_view');
			}else{
				$this->session->set_flashdata('res_reg_err', $result['message']);
				$this->load->view('super_admin/restaurant_add_view');
			}
		}
	}

	public function rest_edit_img(){
		$user = $this->input->post();
		 //Check whether user upload picture
        if(!empty($_FILES['rest_img']['name'])){
            $config['upload_path'] = './images/restaurants';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $_FILES['rest_img']['name'];
            $config['encrypt_name'] = TRUE;
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('rest_img')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }
        }else{
            $picture = '';
        }
        $user['picture'] = $picture;

		if($this->Main_model->rest_img_edit($user)){
			$this->session->set_flashdata('res_img_err', 'Image Updated Successfully.');
			$p = $config['upload_path'].'/'.$user['db_img'];
			if(is_file(base_url()) . 'images/restaurants/'.$user['db_img']) {
				unlink($config['upload_path'].'/'.$user['db_img']);	
			}
			redirect('su_restaurants');
		}else{
			$this->session->set_flashdata('res_img_err', 'Image Update Failed.');
			redirect('su_restaurants');
		}
	}

	public function restaurant_edit_submit(){
		$user = $this->input->post();
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('mobile','Mobile','required|regex_match[/^[0-9]{10}$/]|callback_check_mobile');
		$this->form_validation->set_rules('restaurant_name','Restaurant Name','required');
		$this->form_validation->set_rules('restaurant_email', 'Restaurant Email', 'required|valid_email|callback_check_mail');
		$this->form_validation->set_rules('restaurant_address','Address','required');
		$this->form_validation->set_rules('restaurant_city','City','required');
		$this->form_validation->set_rules('restaurant_state','State','required');
		$this->form_validation->set_rules('latitude','latitude','required|numeric');
		$this->form_validation->set_rules('longitude','longitude','required|numeric');
		$this->form_validation->set_rules('days[]', 'Days', 'required');
		$this->form_validation->set_rules('s_time','Opening Time','required');
		$this->form_validation->set_rules('e_time','End Time','required');
		$this->form_validation->set_error_delimiters('<div>','</div>');
		if($this->form_validation->run() == FALSE){
			$this->edit_single_restaurant();
		}else{
			$id = $this->uri->segment(2);
			$result = $this->Main_model->restaurant_edit($user,$id);
			if($result['status']){
				$this->session->set_flashdata('res_edit_err', $result['message']);
				redirect('su_restaurants');
			}else{
				$this->session->set_flashdata('res_edit_err', $result['message']);
				$this->edit_single_restaurant();
			}
		}
	}

	public function check_mail($email){
		$id = $this->uri->segment(2);
		if($this->Main_model->check_edit_email($id,$email))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_mail', 'The Email Field Already Exists!');
            return FALSE;
        }
	}

	public function check_mobile($mobile){
		$id = $this->uri->segment(2);
		if($this->Main_model->check_edit_mobile($id,$mobile))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_mobile', 'The Mobile Field Already Exists!');
            return FALSE;
        }
	}

	public function change_rest_status(){
		$action = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		if($this->Main_model->c_status($action,$id)){
			redirect('su_restaurants');
		}else{
			redirect('su_restaurants');
		}
	}

	public function all_restaurants(){
		$data['rest_data'] = $this->Main_model->get_all_restaurants();
		$this->load->view('super_admin/all_restaurants_view',$data);
	}

	public function all_users(){
		$data['rest_data'] = $this->Main_model->get_all_users();
		$this->load->view('super_admin/users_view',$data);
	}

	public function del_user(){
		$action = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		if($this->Main_model->delete_user($action,$id)){
			redirect('su_users');
		}else{
			redirect('su_users');
		}
	}

	public function single_restaurant(){
		$id = $this->uri->segment(2);
		$data['rest_data'] = $this->Main_model->get_single_restaurant($id);
		$this->load->view('super_admin/single_restaurant_view',$data);
	}

	public function edit_single_restaurant(){
		$id = $this->uri->segment(2);
		$data['data'] = $this->Main_model->get_single_restaurant($id);
		$this->load->view('super_admin/edit_single_restaurant_view',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('super_admin');
	}

	public function sliders(){
		$data['sliders'] = $this->Main_model->slider_data();
		$this->load->view('super_admin/sliders_view',$data);
	}

	public function banners(){
		$data['banners'] = $this->Main_model->banner_data();
		$this->load->view('super_admin/banners_view',$data);
	}

	public function slider_add(){

		$user = $this->input->post();
	
		if(!empty($_FILES['slider_img']['name'])){
            $config['upload_path'] = './images/sliders';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $_FILES['slider_img']['name'];
            $config['encrypt_name'] = TRUE;
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('slider_img')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }
        }else{
            $picture = '';
        }
        $user['picture'] = $picture;
		if($this->Main_model->slider_add($user)){
			$this->session->set_flashdata('slider_err', 'Slider Added Successfully');
			redirect('su_sliders');
		}else{
			$this->session->set_flashdata('slider_err', 'Failed to add Slider');
			redirect('su_sliders');
		}
	}

	public function del_slider(){
		$action = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		if($this->Main_model->delete_slider($action,$id)){
			redirect('su_sliders');
		}else{
			redirect('su_sliders');
		}
	}

	public function banner_add(){

		$user = $this->input->post();
	
		if(!empty($_FILES['banner_img']['name'])){
            $config['upload_path'] = './images/banners';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $_FILES['banner_img']['name'];
            $config['encrypt_name'] = TRUE;
            
            //Load upload library and initialize configuration
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('banner_img')){
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            }else{
                $picture = '';
            }
        }else{
            $picture = '';
        }
        $user['picture'] = $picture;
		if($this->Main_model->banner_add($user)){
			$this->session->set_flashdata('banner_err', 'banner Added Successfully');
			redirect('su_banners');
		}else{
			$this->session->set_flashdata('banner_err', 'Failed to add banner');
			redirect('su_banners');
		}
	}

	public function del_banner(){
		$action = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		if($this->Main_model->delete_banner($action,$id)){
			redirect('su_banners');
		}else{
			redirect('su_banners');
		}
	}

}
