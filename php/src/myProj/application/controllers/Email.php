<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class email extends CI_Controller
{
    public function index()
    {
        $this->load->view('email_verification');
        $this->send();
    }

    public function send()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mailhub.eait.uq.edu.au',
            'smtp_port' => 25,
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE ,
            'mailtype' => 'html',
            'starttls' => true,
            'newline' => "\r\n"
            );

        $this->load->model('user_data');
        $user_name = $this->session->userdata('username');
        $user_data = $this->user_data->get_user_data($user_name);
        $user_email = $user_data['user_email'];
        $msg = rand(10000, 99999);
        set_cookie("email_verified", $msg, '60');
        $this->email->initialize($config);
        $this->email->from(get_current_user().'@student.uq.edu.au',get_current_user());
        $this->email->to($user_email);
        //$this->email->cc($this->input->post('cc'));
        $this->email->subject('Experience BNE Email Verification');
        $this->email->message($msg);
        $this->email->send();
        //$this->load->view('template/header');
        //$this->load->view('email');
        //$this->load->view('template/footer');
    }

    public function check_code() {
        $email_verification_code = $this->input->post('emailCode');
        $this->load->model('user_data');
        if (get_cookie('email_verified') == $email_verification_code) {
            $user_name = $this->session->userdata('username');
            $this->user_data->verify_email($user_name);
            redirect(base_url().'index.php/user_profile');
           
        } else {
            redirect(base_url().'index.php/user_profile');
        }
    }



}

?>