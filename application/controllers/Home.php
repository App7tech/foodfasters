<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $this->load->view('home_view');
    }

    public function coming_soon()
    {
        $this->load->view('coming_soon_view');
    }

    public function restaurants()
    {
        $this->load->view('restaurants_view');
    }

    public function display_res()
    {
        $post = $this->input->post();
        $location2 = $this->input->post('location_search');
        if ($location2 != '') {
            $latlong = $this->get_lat_long($location2); // call afunction with the name "get_lat_long" given as below
            $map = explode(',', $latlong);
            $v1 = $map[0];
            $v2 = $map[1];
            $faddress2 = $map[2];
        } else {
            $v1 = doubleval($this->input->post('lat'));
            $v2 = doubleval($this->input->post('lon'));
            $latlng = $v1 . ',' . $v2;
            $fdd = $this->get_address($latlng);
            $full_address = explode(',', $fdd);
            // print_r($full_address);exit();
            $faddress2 = $full_address[2];
        }
        $adrs = $faddress2;
        $this->session->set_userdata('address', $adrs);
        $this->session->set_userdata('lat', $v1);
        $this->session->set_userdata('long', $v2);
        redirect("Home/display_results_submit");
    }

    function get_lat_long($address)
    {
        $address = str_replace(" ", "+", $address);
        $json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyBBnv4MziSkxZ-JVIcOUT4A5T3NiVz-Qzc");
        $json = json_decode($json);
        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        $faddress = $json->{'results'}[0]->{'formatted_address'};
        return $lat . ',' . $long . ',' . $faddress;
    }

    function get_address($latlng)
    {
        // $address = str_replace(" ", "+", $address);
        $json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$latlng&key=AIzaSyBBnv4MziSkxZ-JVIcOUT4A5T3NiVz-Qzc");
        $json = json_decode($json);
        $faddress = $json->{'results'}[0]->{'formatted_address'};

        return $faddress;
    }

    function display_results_submit()
    {

        //put post in session
        $this->load->model('User_model');
        // print_r($this->User_model->user_res($post));exit();
        if ($restaurant['rest'] = $this->User_model->user_res()) {
            // echo "<pre>";
            // print_r($restaurant['rest']['num']);exit();

            $this->load->view('restaurants_view', $restaurant);
        } else {
            $this->session->set_userdata('onload_status', true);
            // print_r($restaurant);exit();
            $err = 'something went wrong.';
            $this->session->set_flashdata('login_error', $err);
            $this->load->view('restaurants_view');
        }
    }

    public function productSearchResults()
    {
    	$restaurant_id = $this->input->post('restaurant_id');
    	$productSearchResults_name = $this->input->post('product_search_key');
    	$this->session->set_userdata('restaurant_id_products',$restaurant_id);
    	$this->session->set_userdata('psrn',$productSearchResults_name);
    	redirect("Home/productSearchResults2");
    }
    public function productSearchResults2()
    {
    	
        
        $this->load->model('seller_admin/Seller_model');
        $result['rest'] = $this->Seller_model->getProductsBySearchKey();

        $result['restaurantId'] = $this->session->userdata('restaurant_id_products');
   //        echo "<pre>";print_r($result);
        if (count($result['rest']) > 0) {

            $this->load->view('menu_view', $result);
        } else {
            $this->session->set_userdata('onload_status', true);
            $err = 'No Products Found with the search key.';
            $this->session->set_flashdata('search_error', $err);

            $this->load->view('menu_view',$result);
        }
    }

    public function menu()
    {
        $this->load->view('menu_view');
    }

    public function contact()
    {
        $this->load->view('contact');
    }

    public function checkout()
    {
        $this->load->view('checkout_view');
    }

    public function login()
    {
        if ($this->session->userdata('email') == '') {
            $this->load->view('login_view');
        } else {
            redirect('Home/index');
        }
    }

    public function register()
    {
        $this->load->view('register_view');
    }

    public function register_submit()
    {
        $this->load->model('User_model');

        $user = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_registration.email]');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|is_unique[user_registration.phone]|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register_view');
        } else {


            if ($this->User_model->user_register($user)) {
                $err = 'Registration success.';
                $this->session->set_flashdata('login_error', $err);
                redirect('Home/login');
            } else {
                $err = 'Registration Fail...Please try again.';
                $this->session->set_flashdata('login_error', $err);
                $this->load->view('register_view');
            }
        }

    }

    public function login_submit()
    {
        $user_data = $this->input->post();
        $this->load->model('User_model');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            $data = $this->User_model->user_login($user_data);
            if ($data['status'] == true) {
                redirect('Home/index');
            } else {
                $this->session->set_flashdata('login_error', $data['message']);
                $this->load->view('login_view');
            }
        }
    }

    public function profile()
    {
        $e = $this->session->userdata('email');
        $d = $e[0]['email'];
        $this->load->model('User_model');
        $data['user'] = $this->User_model->profile($d);
        $this->load->view('profile_view', $data);
    }

    public function edit_profile()
    {
        $e = $this->session->userdata('email');
        $d = $e[0]['email'];
        $this->load->model('User_model');
        $data['user'] = $this->User_model->edit_profile($d);
        $this->load->view('edit_profile', $data);
    }

    public function update_user()
    {
        $this->load->model('User_model');
        $post = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
        if ($this->form_validation->run() == FALSE) {
            redirect('Home/edit_profile');
        } else {


            if ($data = $this->User_model->update_profile($post)) {
                $err = 'Profile Updated successfully.';
                $this->session->set_flashdata('login_error', $err);
                redirect('Home/profile');
            } else {
                $err = 'Updation Fail...Please try again.';
                $this->session->set_flashdata('login_error', $err);
                redirect('Home/edit_profile');
            }
        }

    }

    public function change_pass()
    {
        $this->load->view('change_password');
    }

    public function password_update()
    {
        $this->load->model('User_model');
        $pass = $this->input->post();
        $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('change_password');
        } else {
            $msg = $this->User_model->update_pass($pass);

            if ($msg['status'] == 1) {
                $this->session->set_flashdata('login_error', $msg['message']);
                $this->load->view('home_view');
            } else {
                $this->session->set_flashdata('login_error', $msg['message']);
                $this->load->view('change_password');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("Home/index");
    }

    public function super_admin()
    {
        if ($this->session->userdata('admin_details') == '') {
            $this->load->view('super_admin/login_view');
        } else {
            redirect('su_dashboard');
        }
    }

    public function super_admin_valid()
    {
        $this->load->database();
        $post = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div>', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('super_admin/login_view');
        } else {
            $data = $this->Home_model->super_admin_login($post);
            if ($data['status'] == true) {
                redirect('su_dashboard');
            } else {
                $this->session->set_flashdata('login_error', $data['message']);
                $this->load->view('super_admin/login_view');
            }
        }

    }

    public function seller_admin()
    {
        $this->load->view('seller_admin/login_view');
    }

    public function seller_admin_valid()
    {
        $post = $this->input->post();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_error_delimiters('<div>', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('seller_admin/login_view');
        } else {
            $data = $this->Home_model->seller_admin_login($post);
            if ($data['status'] == true) {
                redirect('se_dashboard');
            } else {
                $this->session->set_flashdata('login_error', $data['message']);
                $this->load->view('seller_admin/login_view');
            }
        }
    }

    public function seller_forgot()
    {
        $this->load->view('seller_admin/forgot_view');
    }

    public function seller_forgot_valid()
    {
        $email = $this->input->post('email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('seller_admin/forgot_view');
        } else {
            //get token
            $token = $this->Home_model->seller_token($email);
            $link = base_url() . "seller_forgot_form/" . $token[0]['token'];
            $r_email = $this->session->userdata('email');
            $res_email = $r_email[0]['restaurant_email'];
            $to = $email;
            $message_new = "Please click on below link to reset your password." . $link;
            $subject = "Password Reset Link";
            $headers = "From: info@foodfasters.com\r\n";
            $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
            $headers .= "Content-Transfer-Encoding: 8bit\r\n";
            $this->load->model('seller_admin/Seller_model');
            $result = $this->Seller_model->forgot($email);
            if ($result['status'] == 1) {
                if (mail($to, $subject, $message_new, $headers)) {
                    $err = 'Forgot link sent to your email.';
                    $this->session->set_flashdata('login_error', $err);
                    redirect('seller_admin/index');
                } else {
                    $err = "Email sent fail please try again.";
                    //echo $result['message'];exit();
                    $this->session->set_flashdata('login_error', $err);
                    $this->load->view('seller_admin/forgot_view');
                }
            } else {
                //$err = "Not a valid Email.";
                //echo $result['message'];exit();
                $this->session->set_flashdata('login_error', $result['message']);
                $this->load->view('seller_admin/forgot_view');
                //redirect('seller_admin/forgot');
            }

        }
    }

    public function seller_forgot_form()
    {
        $data['token'] = $this->uri->segment(2);
        $this->load->view('seller_admin/forgot_form', $data);
    }

    public function seller_forgot_submit()
    {
        $token = $this->uri->segment(2);
        $post = $this->input->post();
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|trim|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->seller_forgot_form();
        } else {
            $this->load->model('seller_admin/Seller_model');
            if ($this->Seller_model->form_submit($post)) {
                $this->session->set_flashdata('login_error', $data['message']);
                $this->load->view('seller_admin/login_view');
            } else {
                $err = 'Password not updated please try again.';
                $this->session->set_flashdata('login_error', $err);
                $this->load->view('seller_admin/login_view');
            }

        }
    }

    public function restaurantRequest()
    {
        $this->load->view('restaurant_request'); // request to place a new restaurant.
    }

    public function addNewRestaurantReqest()
    {
        $this->load->model('super_admin/Main_model');

        $this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email|is_unique[restaurant_request.contact_email]');
        $this->form_validation->set_rules('restaurant_name', 'Restaurant Name', 'required');
        $this->form_validation->set_rules('contact_name', 'Contact Person Name', 'required');
        $this->form_validation->set_rules('contact_address', 'Restaurant Address', 'required');
        $this->form_validation->set_rules('contact_mobile', 'Mobile', 'required|is_unique[restaurant_request.contact_mobile]|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('restaurant_request');
        } else {
            $status = $this->Main_model->addNewRestaurantReqest();

            if ($status['status']) {
                $err = 'Registration success.';
                $this->session->set_flashdata('login_error', $err);
                redirect('Home');
            } else {
                $err = 'Registration Fail...Please try again.';
                $this->session->set_flashdata('login_error', $err);
                $this->load->view('restaurant_request');
            }
        }

    }

    //==== for display food/restuarent results===//
    public function food_results()
    {
        $name = $this->input->post('name');
        $this->session->set_userdata('rest_name', $name);
        redirect("Home/food_results_submit");
    }

    public function food_results_submit()
    {
        $this->load->model('User_model');
        $restaurant['rest'] = $this->User_model->food();
        $this->load->view('restaurants_view', $restaurant);
    }

    //===for menu displaying ====//
    public function check_menu()
    {
        $restaurant_id = $this->uri->segment(3);
        $this->load->model('User_model');
        $result['restaurantId'] = $restaurant_id;
        $result['rest'] = $this->User_model->check_menu($restaurant_id);

        $this->load->view('menu_view', $result);

    }

    //for cart details
    public function cart(){
        $post = $this->input->post();
        $this->load->model('User_model');
        $data = $this->User_model->add_cart($post);
        echo json_encode($data);
    }

    public function getCart(){
        $customer_id = $this->input->post();
        $this->load->model('User_model');
        $data = $this->User_model->getCart($customer_id);
        echo json_encode($data);
    }
}


?>