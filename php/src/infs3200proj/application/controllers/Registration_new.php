<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registration_new extends CI_Controller {

    public function index() {
        $data['error']= "";
        $this->load->view('registration_new', $data);
    }

    public function check_registration () {

        $data['error']= "";
        $this->load->library('form_validation');
        $this->load->model('user_data');

        $this->form_validation->set_rules('email', 'Emal', 'required|valid_email|is_unique[user_information.user_email]', array('valid_email' => 'Please enter a correct email.', 'is_unique' => 'This email has already been used.'));
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user_information.user_name]', array('is_unique' => 'This username has already been used.'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array('min_length' => 'The length of password must between 8 and 12.'));
        $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[password]', array('matches' => 'The confirmed password does not match the password entered before.'));

        
        $result = FALSE;

        if ($this->form_validation->run() == TRUE) {

            if ($this->check_password_strength() == TRUE) {
                $password_hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $user_data = array(
                    'user_name' => $this->input->post('username'),
                    'user_email' => $this->input->post('email'),
                    'user_password' => $password_hash
                );
                $result = $this->user_data->create_user($user_data);
                if ($result == TRUE) {
                    $data['error']= "";
                    $data['recaptcha']= "";
                    $this->load->view('login_new', $data);
                } else {
                    redirect('registration/index');
                }
            } else {
                $data['error']= "<br> <div class=\"alert alert-danger\" role=\"alert\"> The password cannot contain any symbol and must contain at least 1 uppercase letter, 1 lowercase letter and 1 number. Please try it again. </div> ";
                $this->load->view('registration_new', $data);
            }
            
        } else {
            $this->load->view('registration_new', $data);
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