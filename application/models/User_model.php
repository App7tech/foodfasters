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
			'datetime'=>$date);
		$query =$this->db->insert('user_registration',$data);
		return $this->db->insert_id();		
		
	}
	public function user_login($data){
	
	//check email
		$e_where = array('email'=>$data["email"]);
		$this->db->where($e_where);
		$e_query = $this->db->get('user_registration');		
		if($e_query->num_rows()!=0){
			//check email with password
			$where = array('email'=>$data["email"],'password'=>md5($data["password"]));
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
				$a_data = array('password',$password);
				$this->db->where($token);
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
}
?>