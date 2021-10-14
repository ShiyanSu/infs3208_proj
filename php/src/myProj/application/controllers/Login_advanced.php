<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_advanced extends CI_Controller {

	public function index() {
		$this->load->view('login_advanced'); // Show the login form
	}







	// public function index()
	// {
	// 	$data['error']= "";
	// 	$this->load->helper('form');
	// 	$this->load->helper('url');
	// 	if (!$this->session->userdata('logged_in'))//check if user already login
	// 	{	
	// 		if (get_cookie('remember')) { // check if user activate the "remember me" feature  
	// 			$username = get_cookie('username'); //get the username from cookie
	// 			$password = get_cookie('password'); //get the username from cookie
	// 			if ( $this->user_model->login($username, $password) )//check username and password correct
	// 			{
	// 				$user_data = array(
	// 					'username' => $username,
	// 					'logged_in' => true 	//create session variable
	// 				);
	// 				$this->session->set_userdata($user_data); //set user status to login in session
	// 				$this->load->view('welcome_message'); //if user already logined show main page
	// 			}
	// 		}else{
	// 			$this->load->view('login_advanced', $data);	//if username password incorrect, show error msg and ask user to login
	// 		}
	// 	}else{
	// 		$this->load->view('welcome_message'); //if user already logined show main page
	// 	}
	// }

	// public function check_login()
	// {
	// 	$this->load->model('user_model');		//load user model
	// 	$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
	// 	$this->load->helper('form');
	// 	$this->load->helper('url');
		
	// 	$username = $this->input->post('username'); //getting username from login form
	// 	$password = $this->input->post('password'); //getting password from login form
		
	// 	if(!$this->session->userdata('logged_in')){	//Check if user already login
	// 		if ( $this->user_model->login($username, $password) )//check username and password
	// 		{
	// 			$user_data = array(
	// 				'username' => $username,
	// 				'logged_in' => true 	//create session variable
	// 			);
				
	// 			$this->session->set_userdata($user_data); //set user status to login in session
	// 			redirect('login_advanced'); // direct user home page
	// 		}else
	// 		{
	// 			$this->load->view('login_advanced', $data);	//if username password incorrect, show error msg and ask user to login
	// 		}
	// 	}else{
	// 		{
	// 			redirect('login_advanced'); //if user already logined direct user to home page
	// 		}
		
	// 	}
	// }

	// public function logout()
	// {
	// 	$this->session->unset_userdata('logged_in'); //delete login status
	// 	redirect('login_advanced'); // redirect user back to login
	// }


// 	public function index() {
// 		$this->login();
// 	}
	
// 	public function login() {
// 		$this->load->view('login_advanced');
// 	}

// 	public function signin() {}

// 	public function data() {
// 		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
// 		if ($this->session->userdata('is_login')) {
// 			$this->load->view('welcome_message');
// 		} else {
// 			$this->load->view('login_advanced', $data);
// 		}
// 	}

// 	public function check_login() {
// 		$this->load->model('user_model');
// 		$this->load->helper('form');
// 		$this->load->helper('url');
// 		$username = $this->input->post('username');
// 		$password = $this->input->post('password');
// 		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
// 		if (!$this->session->userdata('is_login')) {
// 			if ( $this->user_model->login($username, $password) )//check username and password
// 			{
// 				$user_data = array(
// 					'username' => $username,
// 					'is_login' => true 	//create session variable
// 				);
				
// 				$this->session->set_userdata($user_data); //set user status to login in session
// 				redirect('login_advanced'); // direct user home page
// 			}else
// 			{
// 				$this->load->view('login_advanced', $data);	//if username password incorrect, show error msg and ask user to login
// 			}
// 		} else {
// 			redirect('login_advanced');
// 		}
// 	}

// 	public function logout() {
// 		$this->session->session_destroy;
// 		redirect('login_advanced');
// 	}
}
?>