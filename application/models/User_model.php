<?php  
class User_model extends CI_Model{
	public function user_register($user){
		//check email
		$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$ref = "";
		for ($i = 0; $i < 6; $i++) {
		    $ref .= $chars[mt_rand(0, strlen($chars)-1)];
		}
		$token = md5($user['name']|$user['email']);
		$date = date('d-M-Y h:i:s A');
		$status = 'active';
		
		$data = array('username'=>$user['name'],
					  'email'=>$user['email'],
					  'phone'=>$user['mobile'],
					  'password'=>md5($user['password']),
					  'referal_code'=>$ref,
					  'token'=>$token,
					  'status'=>$status,
					  'datetime'=>$date
				);
		$query =$this->db->insert('user_registration',$data);
		return $this->db->insert_id();		
		
	}
	public function user_login($post){
	
	//check email
		$e_where = array('email'=>$post["email"]);
		$this->db->where($e_where);
		$e_query = $this->db->get('user_registration');		
		if($e_query->num_rows()!=0){
			//check email with password
			$where = array('email'=>$post["email"],'password'=>md5($post["password"]));
			$this->db->where($where);
			$query = $this->db->get('user_registration');
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
	public function profile($email){
		$this->db->where('email',$email);
		$profile_data = $this->db->get('user_registration');
		return $result = $profile_data ->result_array();
	}
	public function edit_profile($email){
		$this->db->where('email',$email);
		$profile_data = $this->db->get('user_registration');
		return $result = $profile_data ->result_array();

	}
	public function update_profile($post){
		$email = $post['db_email'];
		$data = array(
			"email"=>$post['email'],
			"username"=>$post['name'],
			"phone"=>$post['mobile']
		);

		$this->db->where('email',$email);
		return $this->db->update('user_registration',$data);
	}
	public function update_pass($data){
		$pemail = $data['db_email'];
		$this->db->where('email',$pemail);
		$query = $this->db->get('user_registration');
		$result = $query->result_array();
		foreach ($result as $cd) :
			$db_pass = $cd['password'];
			endforeach;
		
		if($db_pass == md5($data['old_pass'])){
			if($data['password'] == $data['cpassword']){
				$pp = array('password'=>md5($data['password']));
				$this->db->where('email',$pemail	);
			    $this->db->update('user_registration',$pp);
				$msg['status'] = 1;
				$msg['message'] = "Pasword changed Successfully.";
				return $msg;
			}else{
				$msg['status'] = 0;
				 $msg['message'] = "Passwords doesn't match..!";
				 return $msg;
			}
		}else{
			$msg['status'] = 0;
			$msg['message'] = "Old Password doesn't match"; 
			return $msg;
		}
	}
	public function forgot($email){
		$this->db->where('email',$email);
		$query = $this->db->get('user_registration');
		if($query->num_rows() !=0){
			return $result = $query->result_array();
			
		}
	}
	public function forgot_link($post){
		$password = $post['password'];
		$cpassword = $post['cpassword'];
		$token = $post['token'];
		if($password == $cpassword){
			$this->db->where('token',$token);
			$query = $this->db->get('user_registration');
			if($query->num_rows() !=0){
				$a_data = array('password'=>md5($password));
				$this->db->where('token',$token);
				$result = $this->db->update('user_registration',$a_data);
				$data['message'] = $result;
				return $data;
			}else{
				$data['message'] = "No record found.";
				return $data;
			}
		}else{
			$data['message'] = "passwords doesn't match.";
			return$data;
		}
		
	}
	
	public function forgot_check($email,$token){
		$this->db->where('email',$email);
		$this->db->where('token',$token);
		$this->db->select('username');
		$q = $this->db->get('user_registration');
		if($q->num_rows()!=0){
			return $q->result_array();
		}else{
			return false;
		}
	}
	
	//================for resturants list ===========//
	function user_res(){
		$v1 = $this->session->userdata('lat');
		$v2 = $this->session->userdata('long'); 
		//get post values by session
		$q=$this->db->query("select * , (6371 * acos( cos( radians($v1)) * cos( radians( Latitude ) ) * cos( radians( longitude ) - radians($v2))  + sin( radians($v1) ) * sin( radians( Latitude ) ) ) ) AS distance FROM  restaurant_add HAVING distance < 25 ORDER BY distance LIMIT 0 , 20");
		$r['restaurant'] = $q->result_array();
		$r['products'] = array();
		$r['num']=$q->num_rows();
		return $r;
	}
	//=============for fetching food/restuarants results=======//
	public function food(){
		$name = $this->session->userdata('rest_name');
		$v1 = $this->session->userdata('lat');
		$v2 = $this->session->userdata('long'); 
		$like = "%".$name."%";
		$q=$this->db->query("select * , (6371 * acos( cos( radians($v1)) * cos( radians( Latitude ) ) * cos( radians( longitude ) - radians($v2))  + sin( radians($v1) ) * sin( radians( Latitude ) ) ) ) AS distance FROM  restaurant_add  WHERE restaurant_name LIKE '$like' HAVING distance < 25 ORDER BY distance LIMIT 0 , 20");
		$data['restaurant'] = $q->result_array();
		$data['num']=$q->num_rows();
		// echo "<pre>";

		$this->db->select('*');
		$this->db->from('products');
		$this->db->like('product_name',$name);
		$query = $this->db->get();
		$food = $query->result_array();
		$i = 0;
		foreach($food as $foo){
			$rest_id = $foo['restaurant_id'];
			$q=$this->db->query("select * , (6371 * acos( cos( radians($v1)) * cos( radians( Latitude ) ) * cos( radians( longitude ) - radians($v2))  + sin( radians($v1) ) * sin( radians( Latitude ) ) ) ) AS distance FROM  restaurant_add WHERE restaurant_id = '$rest_id' HAVING distance < 25 ORDER BY distance LIMIT 0 , 20");
			$f_rest = $q->result_array();
			//if not = empty array take product
			if(!empty($f_rest)){
				$data['products'][$i] = $foo;
				$data['products'][$i]['restaurant_name'] = $f_rest[0]['restaurant_name'];
				$data['products'][$i]['restaurant_address'] = $f_rest[0]['restaurant_address'];
				$data['products'][$i]['Latitude'] = $f_rest[0]['Latitude'];
				$data['products'][$i]['longitude'] = $f_rest[0]['longitude'];
				$data['products'][$i]['distance'] = $f_rest[0]['distance'];
			}
			$i++;
		}
		return $data;
	}
	//==== for displaying menu items ===//
	public function check_menu($rest_id){
		$this->db->where('restaurant_id',$rest_id);
		$q = $this->db->get('restaurant_add');
		$query['restaurant'] = $q->result_array();

		//for category details query==//
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('log_status <',3);
		$this->db->where('log_active',1);
		$c = $this->db->get('category');
		$categories = $c->result_array();
		$i =0;
		foreach ($categories as $category) {
			$category_id = $category['category_id'];
			//for fod details query==//
			$this->db->where('restaurant_id',$rest_id);
			$this->db->where('category_id',$category_id);
			$p = $this->db->get('products');
			$food_arr = $p->result_array();
			$categories[$i]['food'] = $food_arr;
			$i++;
		}
		
		$query['food'] = $categories;

		//for category details query==//
		$this->db->where('restaurant_id',$rest_id);
		$this->db->where('log_status <',3);
		$this->db->where('log_active',1);
		$c = $this->db->get('category');
		$query['categories'] = $c->result_array();

		return $query;
	}
	// add product cart 
	public function add_cart($post){
		$data  = array();
		$product_id = $post['product_id'];
		$customer_id = $post['customer_id'];
		$quantity = $post['quantity'];
		$restaurant_id = $post['restaurant_id'];
		if(check($customer_id,'customer_id','user_registration') && check($restaurant_id,'restaurant_id','restaurant_add'))
		{
			$date_time = date('d-M-Y h:i:s A');
			$this->db->where('customer_id',$customer_id);
			$query 		= $this->db->get('cart');
			$result 	= $query->result_array();
			$num_rows 	=$query->num_rows();
			// $rest_id 	= $result['restaurant_id'];
			if($num_rows != 0){
				//if details found with customer id
				$this->db->where('customer_id',$customer_id);
				$this->db->where('restaurant_id',$restaurant_id);
				$query2 	= $this->db->get('cart');
				$result2 	= $query2->result_array();
				$num_rows2 	= $query2->num_rows();

				if($num_rows2 == 0){
					$data['status'] = false;
					$data['message'] = 'Restaurant Changed!';
				}//inner if close
				else{
					
					$this->db->where('product_id',$product_id);
					$this->db->where('restaurant_id',$restaurant_id);
					$this->db->where('customer_id',$customer_id);
					$query3 	= $this->db->get('cart');
					$result3  	= $query3->result_array();
					$num_rows3 	= $query3->num_rows();
					if($num_rows3 == 0){
						
						//if no records match with product_id, add one more record/product into cart table
						$cartData = array("restaurant_id" => $restaurant_id,
									   "product_id" => $product_id,
									   "customer_id" => $customer_id,
									   "date_time" => $date_time
									);
						$query4 			= $this->db->insert('cart',$cartData);
						$insert_id 			= $this->db->insert_id();
						// $data['insert_id'] 	= $insert_id;
						$data['status'] 	= true;
						$data['message'] 	= $insert_id;
					}else{
						// $data['details'] = $result3;
						$cartQuantity 	= $result3[0]['quantity'];
						//if same product, to increase the quantity and update cart for sampe product
						$updateQuantity = $quantity + $cartQuantity;
						$cartUpdate  = array('quantity' => $updateQuantity);
						$this->db->where('customer_id',$customer_id);
						$this->db->where('restaurant_id',$restaurant_id);
						$this->db->update('cart',$cartUpdate);
						$data['status'] = true;
						$data['message'] = 'Quantity updated.';
					}//else cose

				} //inner else close
			}//if close
			else{
				//store data into cart
				$cartData = array("restaurant_id" => $restaurant_id,
								   "product_id" => $product_id,
								   "customer_id" => $customer_id,
								   "quantity" => $quantity,
								   "date_time" => $date_time
								  );
				$this->db->insert('cart',$cartData);
				$last_id = $this->db->insert_id();
				if($last_id != ''){
					$data['status'] = true;
					$data['message'] = 'New record/order inserted to cart.';
				} else{
					$data['status'] = false;
					$data['message'] = 'Fail to insert record/product into cart.';
				}
			}//else close
			
		}//check function if close
		else{
			$data['stauts'] = false;
			$data['message'] = 'Invalid customer/restaurant.';
		}
		return $data;
	}//function close

	function check($data,$coloumn_name,$table_name){
		$this->db->where($coloumn_name,$data);
		$checkData = $this->db->get($table_name);
		$rows = $checkData->num_rows();
		if($rows != 0){
			return true;
		}else{
			return false;
		}
	}
}
?>