<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forget_password extends CI_Controller {
    public function index() {
        $data['error']= "";
        $this->load->view('forget_password', $data);
    }

    public function check_email() {
        $data['error']= "";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('registeredEmail', 'Emal', 'required|valid_email', array('valid_email' => 'Please enter a correct email.'));
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('registeredEmail');
            $this->load->model('user_data');
            if ($this->user_data->check_email($email) == TRUE) {
                $this->load->view('forget_password_email');
                $this->send_email($email);
            } else {
                $this->index();
            } 
        } else {
            $this->load->view('forget_password', $data);
        }
    }

    public function send_email($email) {
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

        
        $msg = rand(10000, 99999);
        set_cookie("email_verified_code", $msg, '60');
        $this->email->initialize($config);
        $this->email->from(get_current_user().'@student.uq.edu.au',get_current_user());
        $this->email->to($email);
        //$this->email->cc($this->input->post('cc'));
        $this->email->subject('Experience BNE Forget Password Email Verification');
        $this->email->message($msg);
        $this->email->send();
    }

    public function check_code() {
        $email_verification_code = $this->input->post('emailCode');
        
        if (get_cookie('email_verified_code') == $email_verification_code) {
            $data['error']= "";
           $this->load->view('forget_password_reset', $data);
        } else {
            $this->index();
        }
    }

    public function reset_password() {
        $data['error']= "";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array('min_length' => 'The length of password must between 8 and 12.'));
        $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[password]', array('matches' => 'The confirmed password does not match the password entered before.'));
        $this->load->model('user_data');
        if ($this->form_validation->run() == TRUE) {
            if ($this->check_password_strength() == TRUE) {
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                //$password = $this->input->post('password');
                $result = $this->user_data->reset_password($username, $password);
                if ($result == TRUE) {
                    $data['error']= "";
                    $data['recaptcha']= "";
                    $this->load->view('login_new', $data);
                } else {
                    $this->load->view('forget_password_reset');
                }
            } else {
                $data['error']= "<br> <div class=\"alert alert-danger\" role=\"alert\"> The password cannot contain any symbol and must contain at least 1 uppercase letter, 1 lowercase letter and 1 number. Please try it again. </div> ";
                $this->load->view('forget_password_reset', $data);
            }
        } else {
            $this->load->view('forget_password_reset', $data);
        }
    }

    public function check_password_strength() {
        $password = $this->input->post('password');

        $is_uppercase_letter = 0;
        $is_lowercase_letter = 0;
        $is_special_symbol = 0;
        $is_number = 0;

        for ($i = 0; $i < strlen($password); $i++) {
            $password_ascii = ord($password[$i]);
            if ($password_ascii >= 65 && $password_ascii <= 90) {
                $is_uppercase_letter = 1;
            } elseif ($password_ascii >= 97 && $password_ascii <= 122) {
                $is_lowercase_letter = 1;
            } elseif (($password_ascii >= 33 && $password_ascii <= 47) 
                || ($password_ascii >= 58 && $password_ascii <= 64) 
                || ($password_ascii >= 91 && $password_ascii <= 96) 
                || ($password_ascii >= 123 && $password_ascii <= 126)) {
                $is_special_symbol = 1;
            } elseif ($password_ascii >= 48 && $password_ascii <= 57) {
                $is_number = 1;
            }
        }

        if ($is_lowercase_letter == 1 && $is_uppercase_letter == 1 && $is_number == 1 && $is_special_symbol == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>