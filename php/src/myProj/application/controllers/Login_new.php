<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_new extends CI_Controller {

    public function index() {
        
        $data['error']= "";
        $data['recaptcha']= "";
        $this->load->view('login_new', $data);
    }

    public function check_login() {
       

        $this->load->helper('url');
        $this->load->library('session');
        // $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        // $userIp=$this->input->ip_address();
     
        // $secret = $this->config->item('google_secret');
   
        // $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        // $ch = curl_init(); 
        // curl_setopt($ch, CURLOPT_URL, $url); 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output = curl_exec($ch); 
        // curl_close($ch);      
         
        // $status= json_decode($output, true);
 
        $status['success'] = true;
        if ($status['success']) {
            // print_r('Google Recaptcha Successful');
            // exit;
            $this->load->library('form_validation');
        
            if (get_cookie('remember')) {
                if (get_cookie('username') == $_POST["username"]) {
                    $sesstion_data = array(
                            'username' => $this->input->post('username'),
                            'logged_in' => TRUE,
                            'current_review_id' =>''
                    );
                    $this->session->set_userdata($sesstion_data);
                    $this->load->view('homepage');
                } else {
                    $this->form_validation->set_rules('username', 'Username', 'required');
                    $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                    if ($this->form_validation->run() == TRUE) {
                        $this->load->model('user_data');
                        
                        $correct_password = $this->user_data->get_password($this->input->post('username'));
                        if (password_verify($this->input->post('password'), $correct_password)) {
                            $sesstion_data = array(
                                'username' => $this->input->post('username'),
                                'logged_in' => TRUE
                            );
                            $this->session->set_userdata($sesstion_data);
                            if ($this->input->post('remember')) {
                                set_cookie("username", $_POST["username"], '300'); 
                                set_cookie("password", $_POST["password"], '300'); 
                                set_cookie("remember", $_POST["remember"], '300');
                            }
                            $this->load->view('homepage'); 
                        } else {
                            $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
                            $data['recaptcha']= "";
                            $this->load->view('login_new', $data); 
                        }

                        $user_data = array (
                            'username' => $this->input->post('username'),
                            'password' => $this->input->post('password')
                        );
                        // if ($this->user_data->login($user_data)) {
                        //     $sesstion_data = array(
                        //         'username' => $this->input->post('username'),
                        //         'logged_in' => TRUE
                        //     );
                        //     $this->session->set_userdata($sesstion_data);
                        //     if ($this->input->post('remember')) {
                        //         set_cookie("username", $_POST["username"], '300'); 
                        //         set_cookie("password", $_POST["password"], '300'); 
                        //         set_cookie("remember", $_POST["remember"], '300');
                        //     }
                        //     $this->load->view('homepage'); 
                        // } else {
                        //     $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
                        //     $data['recaptcha']= "";
                        //     $this->load->view('login_new', $data); 
                        // }
                    } else {
                        $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect format of username or password!! </div> ";
                        $data['recaptcha']= "";
                        $this->load->view('login_new', $data);
                    }
                }
            } else {
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                if ($this->form_validation->run() == TRUE) {
                    $this->load->model('user_data');

                    $correct_password = $this->user_data->get_password($this->input->post('username'));
                        if (password_verify($this->input->post('password'), $correct_password)) {
                            $sesstion_data = array(
                                'username' => $this->input->post('username'),
                                'logged_in' => TRUE
                            );
                            $this->session->set_userdata($sesstion_data);
                            if ($this->input->post('remember')) {
                                set_cookie("username", $_POST["username"], '300'); 
                                set_cookie("password", $_POST["password"], '300'); 
                                set_cookie("remember", $_POST["remember"], '300');
                            }
                            $this->load->view('homepage'); 
                        } else {
                            $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
                            $data['recaptcha']= "";
                            $this->load->view('login_new', $data); 
                        }
                    $user_data = array(
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password')
                    );
                    // if ($this->user_data->login($user_data)) {
                    //     $sesstion_data = array(
                    //         'username' => $this->input->post('username'),
                    //         'logged_in' => TRUE
                    //     );
                    //     $this->session->set_userdata($sesstion_data);
                    //     if ($this->input->post('remember')) {
                    //         set_cookie("username", $_POST["username"], '300'); 
                    //         set_cookie("password", $_POST["password"], '300'); 
                    //         set_cookie("remember", $_POST["remember"], '300');
                    //     } 
                    //     $this->load->view('homepage');
                    // } else {
                    //     $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
                    //     $data['recaptcha']= "";
                    //     $this->load->view('login_new', $data);
                    // }
                } else {
                    $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect format of username or password!! </div> ";
                    $data['recaptcha']= "";
                    $this->load->view('login_new', $data);
                }
            }
        }else{
            // print_r('Google Recaptcha Successful');
            $data['recaptcha']= "<div class=\"alert alert-danger\" role=\"alert\"> Sorry Google Recaptcha Unsuccessful!! </div> ";
            $data['error']= "";
            $this->load->view('login_new', $data);
            //$this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
            //$this->index();
        }
 
        // redirect('form', 'refresh');

        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        // if ($this->form_validation->run() == TRUE) {

        //     $this->load->model('user_data');
        //     $user_data = array(
        //         'username' => $this->input->post('username'),
        //         'password' => $this->input->post('password')
        //     );
        //     if ($this->user_data->login($user_data)) {

        //         // need to consider...
        //         $sesstion_data = array(
        //             '$username' => $this->input->post('username'),
        //             'logged_in' => TRUE
        //         );
        //         $this->session->set_userdata($sesstion_data);
        //         if ($this->input->post('remember')) {
        //             set_cookie("username", $_POST["username"], '300'); 
		// 			set_cookie("password", $_POST["password"], '300'); 
		// 			set_cookie("remember", $_POST["remember"], '300');
        //         } 
        //         // return to home page
        //         $this->load->view('header_product');
        //     } else {
        //         $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or password!! </div> ";
        //         $this->load->view('login_new', $data); 
        //     }
        // } else {
        //     // incorrect format
        //     $data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect format of username or password!! </div> ";
        //     $this->load->view('login_new', $data);
        // }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('index.php/login_new');
    }

    public function auto_logout() {
        $this->session->unset_userdata('logged_in');
    }

    // public function formPost() {

    //     $this->load->helper('url');
    //     $this->load->library('session');
    //     $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
    //     $userIp=$this->input->ip_address();
     
    //     $secret = $this->config->item('google_secret');
   
    //     $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
    //     $ch = curl_init(); 
    //     curl_setopt($ch, CURLOPT_URL, $url); 
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    //     $output = curl_exec($ch); 
    //     curl_close($ch);      
         
    //     $status= json_decode($output, true);
 
    //     if ($status['success']) {
    //         print_r('Google Recaptcha Successful');
    //         exit;
    //     }else{
    //         $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
    //     }
 
    //     redirect('form', 'refresh');
    // }   
}

?>