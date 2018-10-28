<?php

class Main_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function restaurant_add($data)
    {
        $name = $data['name'];
        $phone = $data['mobile'];
        $r_name = $data['restaurant_name'];
        $r_email = $data['restaurant_email'];
        $r_address = $data['restaurant_address'];
        $r_city = $data['restaurant_city'];
        $r_state = $data['restaurant_state'];
        $days = $data['days'];
        $s_time = $data['s_time'];
        $e_time = $data['e_time'];
        $longitute = $data['longitude'];
        $latitute = $data['latitude'];
        $token = md5($r_email);
        $status = 'active';
        //randam code for password.
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = "";
        for ($i = 0; $i < 6; $i++) {
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        $count_days = count($days);
        $days2 = array();
        for ($d = 0; $d < $count_days; $d++) {
            $days2[] = $days[$d];
        }
        $days3 = serialize($days2);

        $r_image = $data['picture'];

        $datetime = date('d-M-Y h:i:s A');
        $data_details = array('name' => $name, 'mobile' => $phone, 'restaurant_name' => $r_name, 'restaurant_email' => $r_email, 'password' => md5($password), 'token' => $token, 'image' => $r_image, 'restaurant_address' => $r_address, 'restaurant_city' => $r_city, 'restaurant_state' => $r_state, 'latitude' => $latitute, 'longitude' => $longitute, 'open_days' => $days3, 'open_time' => $s_time, 'close_time' => $e_time, 'status' => $status, 'datetime' => $datetime);
        //code for email to send restaurant login details.
        $message = "Please find bellow Details for login to your restaurant, if you want to reset your password please login with this details and change.<br>
		Username : " . $r_name . "<br>Password: " . $password;
        $subject = "Restarant Details";
        $to = $r_email;

        $headers = "From: info@foodfasters.com\r\n";

        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";
        $query = $this->db->insert('restaurant_add', $data_details);
        $id = $this->db->insert_id();
        $msg['status'] = false;
        if ($query) {
            if (mail($to, $subject, $message, $headers)) {
                $msg['message'] = 'restaurant details Sent to restaurent mail';
                $msg['last_id'] = $id;
                $msg['status'] = true;
                $msg['message'] = "Restaurant Added Successfully";
                return $msg;
            } else {
                $msg['message'] = 'Mail sent fail';
                return $msg;
            }
        } else {
            $msg['message'] = 'Fail to insert restaurant.';
            return $msg;
        }
        return $msg;

    }

    public function rest_img_edit($data)
    {
        $id = $data['rest_id'];
        $picture = $data['picture'];
        $data = array('image' => $picture);
        $this->db->where('id', $id);
        $q = $this->db->update('restaurant_add', $data);
        if ($this->db->affected_rows() >= 0) {
            return true;
        } else {
            return false;
        }
    }

    public function restaurant_edit($data, $id)
    {
        $name = $data['name'];
        $phone = $data['mobile'];
        $r_name = $data['restaurant_name'];
        $r_email = $data['restaurant_email'];
        $r_address = $data['restaurant_address'];
        $r_city = $data['restaurant_city'];
        $r_state = $data['restaurant_state'];
        $days = $data['days'];
        $s_time = $data['s_time'];
        $e_time = $data['e_time'];
        $longitute = $data['longitude'];
        $latitute = $data['latitude'];
        $count_days = count($days);
        $days2 = array();
        for ($d = 0; $d < $count_days; $d++) {
            $days2[] = $days[$d];
        }
        $days3 = serialize($days2);

        $data_details = array('name' => $name, 'mobile' => $phone, 'restaurant_name' => $r_name, 'restaurant_email' => $r_email, 'restaurant_address' => $r_address, 'restaurant_city' => $r_city, 'restaurant_state' => $r_state, 'latitude' => $latitute, 'longitude' => $longitute, 'open_days' => $days3, 'open_time' => $s_time, 'close_time' => $e_time);
        $this->db->where('id', $id);
        $query = $this->db->update('restaurant_add', $data_details);
        $msg['status'] = false;
        if ($query) {
            $msg['status'] = true;
            $msg['message'] = "Restaurant Edited Successfully";
        } else {
            $msg['message'] = 'Fail to Edit Restaurant!';
        }
        return $msg;
    }


    public function get_all_restaurants()
    {
        $q = $this->db->get('restaurant_add');
        return $q->result_array();
    }

    public function get_single_restaurant($id)
    {
        $this->db->where('id', $id);
        $q = $this->db->get('restaurant_add');
        return $q->result_array();
    }

    public function check_edit_email($id, $email)
    {
        $data = $this->get_single_restaurant($id);
        if ($email != $data[0]['restaurant_email']) {
            $this->db->where('restaurant_email', $email);
            $q = $this->db->get('restaurant_add');
            if ($q->num_rows() == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function check_edit_mobile($id, $mobile)
    {
        $data = $this->get_single_restaurant($id);
        if ($mobile != $data[0]['mobile']) {
            $this->db->where('mobile', $mobile);
            $q = $this->db->get('restaurant_add');
            if ($q->num_rows() == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function c_status($action, $id)
    {
        $data = array('status' => $action);
        $this->db->where('id', $id);
        $q = $this->db->update('restaurant_add', $data);
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_user($action, $id)
    {
        $data = array('status' => $action);
        $this->db->where('id', $id);
        $q = $this->db->update('user_registration', $data);
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_users()
    {
        $q = $this->db->get('user_registration');
        return $q->result_array();
    }

    //sliders
    public function slider_add($data)
    {
        $im_data = array('image' => $data['picture'], 'text' => $data['slider_txt'], 'status' => 'active');
        $q = $this->db->insert('sliders', $im_data);
        return $this->db->insert_id();
    }

    public function slider_data()
    {
        $q = $this->db->get('sliders');
        return $q->result_array();
    }

    public function delete_slider($action, $id)
    {
        $data = array('status' => $action);
        $this->db->where('id', $id);
        $q = $this->db->update('sliders', $data);
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    // banners
    public function banner_add($data)
    {
        $im_data = array('image' => $data['picture'], 'text' => $data['banner_txt'], 'status' => 'active');
        $q = $this->db->insert('banners', $im_data);
        return $this->db->insert_id();
    }

    public function banner_data()
    {
        $q = $this->db->get('banners');
        return $q->result_array();
    }

    public function delete_banner($action, $id)
    {
        $data = array('status' => $action);
        $this->db->where('id', $id);
        $q = $this->db->update('banners', $data);
        if ($q) {
            return true;
        } else {
            return false;
        }
    }

    /*=====================================Delivery Boys Functionality=======================*/
    public function getAllDeliveryBoysData()
    {
        $this->db->where('log_status <', 3);
        $this->db->where('log_active', 1);
        $q = $this->db->get('delivery_boys');
        return $q->result_array();
    }

    public function addNewDeliveryBoy()
    {
        $dboyArray = array('dboy_name' => $this->input->post('dboy_name'),
            'dboy_mobile' => $this->input->post('dboy_mobile'),
            'dboy_address' => $this->input->post('dboy_address'),
            'dboy_email' => $this->input->post('dboy_email'),
            'dboy_token' => md5($this->input->post('dboy_email')),
            'log_datetime' => date('Y-m-d H:i:s')
        );

        $path = './images/deliveryboys';
        if (!empty($_FILES['dboy_photo']['name'])) {
            $fileName = "dboy_photo";
            $imgUploadStatus = $this->imageUpload($path, $fileName);
            if ($imgUploadStatus != "Upload Error") {
                $picture = $imgUploadStatus;
            } else {
                $picture = ""; // upload Failure
            }
        } else {
            $picture = ''; //not an image
        }
        $dboyArray['dboy_photo'] = $picture;

        if (!empty($_FILES['dboy_id_proof']['name'])) {
            $fileName = "dboy_id_proof";
            $imgUploadStatus = $this->imageUpload($path, $fileName);
            if ($imgUploadStatus != "Upload Error") {
                $IDpic = $imgUploadStatus;
            } else {
                $IDpic = ""; // upload Failure
            }
        } else {
            $IDpic = ''; //not image upload
        }
        $dboyArray['dboy_id_proof'] = $IDpic;


        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = "";
        for ($i = 0; $i < 6; $i++) {
            $password .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        //code for email to send Delivery Boy login details.
        $message = "Please find bellow Details for login to your restaurant, if you want to reset your password please login with this details and change.<br>
		Username : " . $this->input->post('dboy_name') . "<br>Password: " . $password;
        $subject = "Delivery Boy Login Details";
        $to = $this->input->post('dboy_email');

        $headers = "From: info@foodfasters.com\r\n";

        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";
        $query = $this->db->insert('delivery_boys', $dboyArray);
        $id = $this->db->insert_id();
        $msg['status'] = false;
        if ($query) {
            if (mail($to, $subject, $message, $headers)) {
                $msg['message'] = 'Delivery Boy details Sent to mail';
                $msg['last_id'] = $id;
                $msg['status'] = true;
                $msg['message'] = "Delivery Boy Added Successfully";
                return $msg;
            } else {
                $msg['message'] = 'Mail sent fail';
                return $msg;
            }
        } else {
            $msg['message'] = 'Fail to insert Delivery Boy.';
            return $msg;
        }
        return $msg;

    }

    public function getDeliveryBoyDataById($dboyId)
    {
        $this->db->where('dboy_id', $dboyId);
        $q = $this->db->get('delivery_boys');
        return $q->result_array();
    }

    public function updateDeliveryBoy($dboyId)
    {
        $dboyArray = array('dboy_name' => $this->input->post('dboy_name'),
            'dboy_mobile' => $this->input->post('dboy_mobile'),
            'dboy_address' => $this->input->post('dboy_address'),
            'dboy_email' => $this->input->post('dboy_email'),
            'log_status'=>2,
            'log_datetime' => date('Y-m-d H:i:s')
        );

        $path = './images/deliveryboys';
        if (!empty($_FILES['dboy_photo']['name'])) {
            $fileName = "dboy_photo";
            $imgUploadStatus = $this->imageUpload($path, $fileName);
            if ($imgUploadStatus != "Upload Error") {
                $dboyArray['dboy_photo'] = $imgUploadStatus;
            }
        }
        if (!empty($_FILES['dboy_id_proof']['name'])) {
            $fileName = "dboy_id_proof";
            $imgUploadStatus = $this->imageUpload($path, $fileName);
            if ($imgUploadStatus != "Upload Error") {
                $dboyArray['dboy_id_proof'] = $imgUploadStatus;
               // unlink($path."/");
            }
        }

        $this->db->where('dboy_id',$dboyId);
        $query = $this->db->update('delivery_boys',$dboyArray);
        if($query){
            $msg['status']=true;
            $msg['message'] = "Delivery Boy Updated Successfully";
        }else{
            $msg['status']=false;
            $msg['message'] = 'Fail to Update Delivery Boy.';
        }
        return $msg;


    }

    public function deleteDeliveryBoy($dboyId)
    {
        $data = array('log_active' => 0, 'log_status' => 3, 'log_datetime' => date('Y-m-d H:i:s'));
        $this->db->where('dboy_id', $dboyId);
        $q = $this->db->update('delivery_boys', $data);
        if ($q) {
            return "success";
        } else {
            return "fail";
        }
    }

    public function imageUpload($path, $fileName)
    {
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES[$fileName]['name'];
        $config['encrypt_name'] = TRUE;

        //Load upload library and initialize configuration
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($fileName)) {
            $uploadData = $this->upload->data();
            $picture = $uploadData['file_name'];
        } else {
            $picture = 'Upload Error';
        }
        return $picture;
    }

}