<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');

    }

    public function contact_submit()
    {

        $data = $this->input->post();
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $phone = $this->input->post('phone');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $date = date('d-M-Y h:i:s A');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('contact');
        } else {
            $message_new = "<h1>Customer EnQuery</h1><h3>Person name:$fname</h3>
            <h3>E-Mail: $email</h3>
            <h3>Mobile Number: $phone</h3>
            <h3>First Name : $fname</h3>
            <h3>Last Name : $lname</h3>
            <h3>Subject : $subject</h3>
            <h3>Message: $message</h3>
            <h3>Date: $date</h3>";
            //$subject="Enquiry From Website";
            $to = $email;

            $headers = "From: info@foodfasters.com\r\n";

            $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
            $headers .= "Content-Transfer-Encoding: 8bit\r\n";

            if (mail($to, $subject, $message_new, $headers)) {
                $err = "Mail sent Successfully..thanking You.";
                $this->session->set_flashdata('login_error', $err);
                $this->load->view('contact');
            } else {
                $err = "Mail Sent Fail";
                $this->session->set_flashdata('login_error', $err);
                $this->load->view('contact');
            }
        }
    }

    public function forgot()
    {
        $this->load->view('forgot_view');
    }

    public function forgot_validate()
    {
        $this->load->model('User_model');
        $email = $this->input->post('email');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forgot_view');
        } else {
            if ($result = $this->User_model->forgot($email)) {
                $token = $result[0]['token'];
                $link = base_url() . "Contact/forgot_link/".$email."/".$token;
                $message_new = 'Please click on below link to reset your password.<a href=' . $link . ' target="_blank">Click Here</a>';
                $subject = "Password Reset Link";
                $to = $email;

                $headers = "From: info@foodfasters.com\r\n";

                $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
                $headers .= "Content-Transfer-Encoding: 8bit\r\n";

                if (mail($to, $subject, $message_new, $headers)) {
                    $err = "Reset link sent to your Mail Successfully.";
                    $this->session->set_flashdata('login_error', $err);
                    $this->load->view('forgot_view');
                } else {
                    $err = "Failed to Send Reset Link!";
                    $this->session->set_flashdata('login_error', $err);
                    $this->load->view('forgot_view');
                }
            } else {
                $err = "Not a valid email.. please provide correct email.";
                $this->session->set_flashdata('login_error', $err);
            }
        }
    }
    
    public function forgot_change_password(){
        $email = $this->uri->segment(3);
        $token = $this->uri->segment(4);
        $this->load->model('User_model');
        $data['result'] = $this->User_model->forgot_check($email,$token);
        if($data['result']){
            $this->load->view('forgot_change_password',$data);
        }else{
            echo "<script>alert('Invalid Link! You are not allowed! Retry Forgot Password!');window.location='".base_url()."Contact/forgot';</script>";
        }
    }

    public function forgot_link()
    {
        $this->load->model('User_model');
        $post = $this->input->post();
        $post['token'] = $this->uri->segment(4);
        $password = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->forgot_change_password();
        } else {
            if ($result = $this->User_model->forgot_link($post)) {
                $this->session->set_flashdata('login_error', "Password Changed Successfully!");
                $this->load->view('login_view');
            } else {
                $err = 'fail to change password..please try again.';
                $this->session->set_flashdata('login_error', $result['message']);
                $this->load->view('home_view');
            }
        }
    }
}

?>