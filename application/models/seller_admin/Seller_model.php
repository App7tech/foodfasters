<?php     
class Seller_model extends CI_Model{
	public function login($post){
		$this->load->database();
		$password = $post['password'];
		$email = $post['email'];
		$e_where = array('restaurant_email'=>$email);
		$this->db->where($e_where);
		$e_query = $this->db->get('restaurant_add');		
		if($e_query->num_rows()!=0){
			//check email with password
			$where = array('restaurant_email'=>$email,'password'=>md5($password));
			$this->db->where($where);
			$query = $this->db->get('restaurant_add');
			if($query->num_rows()!=0){
				//success login
				$result = $query->result_array();
				$this->session->set_userdata('email',$result);
				$data['status'] = true;
				$data['message'] = $result;
				return $data;
			}else{
				//password error
				$data['status'] = false;
				$data['message'] = "Invalid Password!";
				return $data;
			}
		}else{
			//email error
			$data['status'] = false;
			$data['message'] = "Invalid Email!";
			return $data;
		}
	}
	public function profile($r_email){
		$this->db->where('restaurant_email',$r_email);
		$q = $this->db->get('restaurant_add');
		return $q->result_array();
	}
	public function update_password($post){
		$r_email = $this->session->userdata('email');
		$res_email = $r_email[0]['restaurant_email'];
		$old_pass = $post['old_password'];
		$password = $post['password'];
		$cpassword = $post['cpassword'];
		$this->db->where('restaurant_email',$res_email);
		$query = $this->db->get('restaurant_add');
		$res = $query->result_array();
		foreach ($res as $cd) :
			$db_pass = $cd['password'];
			endforeach;
			
		
		if($password == $cpassword){
			
			if(md5($old_pass) == $db_pass){
				$this->db->where('restaurant_email',$res_email);
				$cpass = array('password'=>md5($password));
				$this->db->update('restaurant_add',$cpass);
					
					$data['message'] = 'password change successfully.';
					return $data;
				
			}else{
				$data['message'] = 'old Password does not match.';
				return $data;
			}
		}else{
			$data['message'] = 'Passwords Does not match.';
			return $data;
		}
	}
	public function forgot($email){
		$this->db->where('restaurant_email',$email);
		$query = $this->db->get('restaurant_add');
		$result =$query->result_array();
		if($query->num_rows()!=0){
			$data['status'] = 1;
			$data['message'] = $result;
			return $data;
		}else{
			$data['message'] = "No data found... invalid email.";
			$data['status'] = 0;
			return $data;
		}
	}
	public function form_submit($post){
		$password = $post['password'];
		$cpassword = $post['cpassword'];
		$email = $post['email']; 
		
		if($password == $cpassword){
			$data1 = array('password'=>md5($password));
			$this->db->where('restaurant_email',$email);
			$this->db->update('restaurant_add',$data1);
			$data['message'] = 'password updated successfully.';
			return $data;
		}else{
			$data['message'] = "Passwords doesnot match.";
			return $data;
		}
	}
		
	public function getAllCategories()
	{
		$this->db->where('log_status <',4);
		$this->db->where('log_active',1);
		$q = $this->db->get('category');
		return $q->result_array();
	}
		
	public function addNewCategory()
	{
		$catArray=array('category_name'=>$this->input->post('category_name'),
						 'description'=>$this->input->post('description'),						 
						 'log_datetime'=>date('Y-m-d H:i:s')
						);
			$query = $this->db->insert('category',$catArray);			
			if($query){
				$msg['status']=true;
				$msg['message'] = "Category Added Successfully";
			}else{
				$msg['status']=false;
				$msg['message'] = 'Fail to insert Category.';				
			}
			return $msg;
						
	}

	public function deleteCategory($status,$catId){
		$data = array('log_status'=>$status,'log_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('category_id',$catId);
		$q = $this->db->update('category',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}
		
	public function getAllProducts()
	{
		$this->db->where('log_status <',3);
		$this->db->where('log_active',1);
		$q = $this->db->get('products');
		return $q->result_array();
	}
	
	public function addNewProduct()
	{
		$prodArray=array('product_name'=>$this->input->post('product_name'),
						 'product_description'=>$this->input->post('product_description'),
						 'price'=>$this->input->post('price'),
						 'selling_price'=>$this->input->post('selling_price'),
						 'category'=>$this->input->post('category'),
						 'log_datetime'=>date('Y-m-d H:i:s')
						);
		if(!empty($_FILES['product_image']['name'])){
                $config['upload_path'] = './images/products';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['product_image']['name'];
                $config['encrypt_name'] = TRUE;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('product_image')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            $prodArray['product_image'] = $picture;	
			
			$query = $this->db->insert('products',$prodArray);			
			if($query){
				$msg['status']=true;
				$msg['message'] = "Product Added Successfully";
			}else{
				$msg['status']=false;
				$msg['message'] = 'Fail to insert Product.';				
			}
			return $msg;
						
	}
	
	public function getProductById($prodId)
	{
		$this->db->where('product_id',$prodId);
		$q = $this->db->get('products');
		return $q->result_array();
	}
	
	public function updateProduct($prodId)
	{
			$prodArray=array('product_name'=>$this->input->post('product_name'),
						 'product_description'=>$this->input->post('product_description'),
						 'price'=>$this->input->post('price'),
						 'selling_price'=>$this->input->post('selling_price'),
						 'category'=>$this->input->post('category'),
						 'log_status'=> 2,
						 'log_datetime'=>date('Y-m-d H:i:s')
						);
		if(!empty($_FILES['product_image']['name'])){
                $config['upload_path'] = './images/products';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['product_image']['name'];
                $config['encrypt_name'] = TRUE;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('product_image')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            $prodArray['product_image'] = $picture;	
			$this->db->where('product_id',$this->input->post('product_id'));			
			$query = $this->db->update('products',$prodArray);			
			if($query){
				$msg['status']=true;
				$msg['message'] = "Product Updated Successfully";
			}else{
				$msg['status']=false;
				$msg['message'] = 'Fail to Update Product.';				
			}
			return $msg;
		
	}
	
	public function deleteProduct($prodId){
		$data = array('log_status'=>3,'log_datetime'=>date('Y-m-d H:i:s'));
		$this->db->where('product_id',$prodId);
		$q = $this->db->update('products',$data);
		if($q){
			//unlink image file 
			return true;
		}else{
			return false;
		}
	}
	
	
}