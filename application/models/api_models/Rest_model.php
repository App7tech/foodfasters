<?php  
class Rest_model extends CI_Model{
	public function restaurants($post){
		$v1 = doubleval($post['lat']);
		$v2 = doubleval($post['lon']);
		$q=$this->db->query("select * , (6371 * acos( cos( radians($v1)) * cos( radians( Latitude ) ) * cos( radians( longitude ) - radians($v2))  + sin( radians($v1) ) * sin( radians( Latitude ) ) ) ) AS distance FROM  restaurant_add HAVING distance < 25 ORDER BY distance LIMIT 0 , 20");
		$r=$q->result_array();
		$i = 0;
		if(!empty($r)){
			foreach ($r as $row) {
				$data[$i]['id'] = $row['restaurant_id'];
				$data[$i]['name'] = $row['name'];
				$data[$i]['mobile'] = $row['mobile'];
				$data[$i]['restaurant_name'] = $row['restaurant_name'];
				$data[$i]['restaurant_email'] = $row['restaurant_email'];
				$data[$i]['image'] = base_url()."images/restaurants/".$row['image'];
				$data[$i]['token'] = $row['token'];
				$data[$i]['restaurant_address'] = $row['restaurant_address'];
				$data[$i]['restaurant_city'] = $row['restaurant_city'];
				$data[$i]['latitude'] = $row['Latitude'];
				$data[$i]['longitude'] = $row['longitude'];
				$data[$i]['distance'] = $row['distance'];
				$data[$i]['open_days'] = unserialize($row['open_days']);
				$data[$i]['open_time'] = $row['open_time'];
				$data[$i]['close_time'] = $row['close_time'];
				$i++;
			}
		}else{
			$data = array();
		}
		return $data;
	}

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
			'device_token'=>$user['device_token'],
			'status'=>$status,
			'datetime'=>$date);
		$query = $this->db->insert('user_registration',$data);
		$data['status'] = $this->db->insert_id();
		
		//select data by id
		$this->db->where('id',$data['status']);
		$q = $this->db->get('user_registration');
		$dd = $q->result_array();
		unset($dd[0]['password']);
		$data['data'] = $dd;
		
		return $data;
	}

	public function categories($post){
		$id = $post['restaurant_id'];
		$this->db->where('restaurant_id',$id);
		$this->db->where('log_status <',3);
		$this->db->where('log_active',1);
		$query = $this->db->get('category');
		return $query->result_array();
	}

	public function products($post){
		$id = $post['restaurant_id'];
		$this->db->where('restaurant_id',$id);
		$this->db->where('log_status <',3);
		$this->db->where('log_active',1);
		$query = $this->db->get('products');
		$r = $query->result_array();
		$data = $r;
		$i = 0;
		if(!empty($r)){
			foreach ($r as $row) {
				if($row['product_image'] == ''){
					$data[$i]['product_image'] = '';
				}else{
					$data[$i]['product_image'] = base_url()."images/products/".$row['product_image'];
				}
				$i++;
			}
		}else{
			$data = array();
		}
		return $data;
	}

	public function category_products($post){
		$id = $post['restaurant_id'];
		$id = $post['category_id'];
		$this->db->where('restaurant_id',$id);
		$this->db->where('category_id',$id);
		$this->db->where('log_status <',3);
		$this->db->where('log_active',1);
		$query = $this->db->get('products');
		$r = $query->result_array();
		$data = $r;
		$i = 0;
		if(!empty($r)){
			foreach ($r as $row) {
				if($row['product_image'] == ''){
					$data[$i]['product_image'] = '';
				}else{
					$data[$i]['product_image'] = base_url()."images/products/".$row['product_image'];
				}
				$i++;
			}
		}else{
			$data = array();
		}
		return $data;
	}
}
?>