<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    public function index() {
        $this->load->view('homepage');
        //$this->load->view('footer');
        //$this->load->view('login_new');
        //echo base_url();
    }
}