<?php  
class Home_model extends CI_Model{
	public function super_admin_login($data){
		//check email
		$e_where = array('email'=>$data["email"]);
		$this->db->where($e_where);
		$e_query = $this->db->get('super_admin');		
		if($e_query->num_rows()!=0){
			//check email with password
			$where = array('email'=>$data["email"],'password'=>md5($data["password"]));
			$this->db->where($where);
			$query = $this->db->get('super_admin');
			if($query->num_rows()!=0){
				//success login
				$result = $query->result_array();
				$this->session->set_userdata('admin_details',$result);
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

	public function seller_admin_login($post){
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

	public function seller_token($email){
		$this->db->select('token');
		$this->db->where('restaurant_email',$email);
		$q = $this->db->get('restaurant_add');
		return $q->result_array();
	}
}
?>