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
	
}