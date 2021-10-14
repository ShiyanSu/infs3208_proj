<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_profile extends CI_Controller {

    public function index() {
        
        $data['error']= "";
        if (!$this->session->userdata('logged_in')){
            $this->load->view('login_new', $data);
        } else {
            $this->load_profile();
        }
    }

    public function load_profile() {
        $data['error']= "";
        $user_name = $this->session->userdata('username');
        $this->load->model('user_data');
        $user_data = $this->user_data->get_user_data($user_name);
        $data['id'] = $user_data['id'];
        $data['username'] = $user_data['user_name'];
        $data['user_email'] = $user_data['user_email'];
        $data['user_image'] = $user_data['user_image'];
        $data['email_verified'] = $user_data['email_verified'];
        $this->load->model('review_data');
        $user_id = $user_data['id'];
        $data['wishlist'] = $this->review_data->load_wishlist($user_id);
        $this->load->view('user_profile', $data);
        $this->load->view('footer');
    }

    public function edit() {
        $this->load->view('profile_edit_new');
    }

    public function edit_profile() {

        $this->load->library('form_validation');
        $this->load->model('user_data');
        $this->form_validation->set_rules('email', 'Emal', 'required|valid_email|is_unique[user_information.user_email]', array('valid_email' => 'Please enter a correct email.', 'is_unique' => 'This email has already been used.'));
        if ($this->form_validation->run() == TRUE) {
      
            $username = $this->session->userdata('username');
            $email_update = $this->input->post('email');
            
            $result = $this->user_data->update_user_data($username, $email_update);

            if ($result == TRUE) {
                $this->load_profile();
                //$this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile update failed');
            }
        } else {
            $this->load->view('profile_edit_new');
        }
    }

    public function upload_user_image() {

       $this->load->library('image_lib');

        $this->load->model('user_data');
        $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "jpg|png|jpeg",
            //'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "7680",
            'max_width' => "10240"
        );

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('user_image') == TRUE) {

            $data = $this->upload->data();
            $this->image_water_mark($data['full_path']);
            $this->user_data->upload_user_image($this->session->userdata('username'), $this->upload->data('file_name'), $this->upload->data('full_path'));

            
            
            $this->load_profile();
        } else {
            $this->load_profile();
        }
    }

    public function image_water_mark($source_image) {
        $this->load->library('image_lib');
            $config['source_image'] = $source_image;
            $config['wm_text'] = 'Experience BNE';
            $config['wm_type'] = 'text';
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config['wm_font_size'] = '16';
            $config['wm_font_color'] = 'ffffff';
            $config['wm_vrt_alignment'] = 'center';
            $config['wm_hor_alignment'] = 'center';
            $config['wm_padding'] = '20';

            $this->image_lib->initialize($config);

            $this->image_lib->watermark();
    }
}

?>