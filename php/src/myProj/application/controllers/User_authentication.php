<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_authentication extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('user_data');
    }
    // public function index() {

    //     // Construction
    //     $data['error'] = "";
    //     $this->load->helper('form');
    //     $this->load->library('form_validation');
    //     $this->load->library('session');
    //     $this->load->model('user_data');

    //     $this->load->view('user_authentication', $data);
        
    // }

    // public function user_registration() {



    //     $this->load->library('form_validation');
    //     $this->load->model('user_data');
      
    //     // $rules = array(
    //     //     [
    //     //         'field' => 'email_register',
    //     //         'label' => 'Email',
    //     //         'rules' => 'required',
    //     //     ],
    //     //     [
    //     //         'field' => 'password_register',
    //     //         'label' => 'Password',
    //     //         'rules' => 'callback_valid_password',
    //     //     ],
    //     //     [
    //     //         'field' => 'confirm_password',
    //     //         'label' => 'Confirm Password',
    //     //         'rules' => 'matches[new_password]',
    //     //     ],
    //     // );

    //     // $this->form_validation->set_rules($rules);

    //     $this->form_validation->set_rules('username_register', 'Username', 'trim|required|xss_clean');
    //     $this->form_validation->set_rules('email_register', 'Email', 'trim|required|xss_clean');
    //     $this->form_validation->set_rules('password_register', 'Password', 'trim|required|xss_clean');

    //     $data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Invalid Registration </div> ";
       
    //     if ($this->form_validation->run() == TRUE) {
    //         $user_data = array(
    //             'user_name' => $this->input->post('username_register'),
    //             'user_email' => $this->input->post('email_register'),
    //             'user_password' => $this->input->post('password_register')
    //         );
            
    //     } else {
    //         // need to fixed
    //         $this->load->view('user_authentication', $data);
    //     }

    //     $result = $this->user_data->create_user($user_data);

    //     if ($result == TRUE) {
           
    //         $this->load->view('user_authentication');
    //     } else {
    //         $this->load->view('user_authentication');
    //     } 
    // }

    // public function valid_password($password = '')
	// {
	// 	$password = trim($password);

	// 	$regex_lowercase = '/[a-z]/';
	// 	$regex_uppercase = '/[A-Z]/';
	// 	$regex_number = '/[0-9]/';
	// 	$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

	// 	if (empty($password))
	// 	{
	// 		$this->form_validation->set_message('valid_password', 'The {field} field is required.');

	// 		return FALSE;
	// 	}

	// 	if (preg_match_all($regex_lowercase, $password) < 1)
	// 	{
	// 		$this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');

	// 		return FALSE;
	// 	}

	// 	if (preg_match_all($regex_uppercase, $password) < 1)
	// 	{
	// 		$this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');

	// 		return FALSE;
	// 	}

	// 	if (preg_match_all($regex_number, $password) < 1)
	// 	{
	// 		$this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');

	// 		return FALSE;
	// 	}

	// 	if (preg_match_all($regex_special, $password) < 1)
	// 	{
	// 		$this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>ยง~'));

	// 		return FALSE;
	// 	}

	// 	if (strlen($password) < 5)
	// 	{
	// 		$this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');

	// 		return FALSE;
	// 	}

	// 	if (strlen($password) > 32)
	// 	{
	// 		$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');

	// 		return FALSE;
	// 	}

	// 	return TRUE;
	// }
	// //strong password end


    // public function user_login() {
    //     $this->load->model('user_data');
    //     $data = array(
    //         'username' => $this->input->post('username'),
    //         'password' => $this->input->post('password')
    //     );

    //     $result = $this->user_data->login($data);
    //     if ($result == TRUE) {

    //         //$username = $this->input->post('username');
    //         //$result = $this->user_data->read_user_information($username);
    //         if ($result != false) {
    //         // $session_data = array(
    //         // 'username' => $result[0]->user_name,
    //         // 'email' => $result[0]->user_email,
    //         // );
    //         // Add user data in session
    //         //$this->session->set_userdata('logged_in', $session_data);
    //         $this->load->view('welcome_message');
    //         }
    //     } else {
    //         $this->load->view('login_advanced');
    //     }
    // }
    
}
