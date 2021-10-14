<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class review_read extends CI_Controller {
  
    public function index () {
        // echo $this->input->post('review_id');
        $data['error']= "";
        $review_id = $this->input->post('review_id');
        $this->load->model('review_data');
        $review_data = $this->review_data->load_review($review_id);
        $data['review_id'] = $review_data['review_id'];
        // $data['user_name'] = $review_data['user_name'];
       
        $data['title'] = $review_data['title'];
        $data['username'] = $review_data['user_name'];
        $data['review'] = $review_data['review'];
        $data['date'] = $review_data['post_date'];
        $data['liked_times'] = $review_data['liked_times'];

        
        $data['comment'] = $this->review_data->load_comment($review_id);

        if (!$this->session->userdata('logged_in')) {
            $data['wishlist_count'] = 0;
        } else {
            $user_name = $this->session->userdata('username');
            $this->load->model('user_data');
            $user_data = $this->user_data->get_user_data($user_name);
            $user_id = $user_data['id'];
            $review_id = $review_data['review_id'];
            $data['wishlist_count'] = $this->review_data->check_wishlist($user_id, $review_id);
        }
    
        $this->load->view('review_page', $data);
    }

    public function write_review() {
        $data['error']= "";
        $data['recaptcha']= "";
        if (!$this->session->userdata('logged_in')){
            $this->load->view('login_new', $data);
        } else {
            if ($this->input->post('anonymousPost')) {
                $comment_data['user_id'] = 21;
                $comment_data['user_name'] = 'Anonymous User';
                $comment_data['review_id'] = $this->input->post('review_id');
                $comment_data['review_comment'] = $this->input->post('comment');
                $this->load->model('review_data');
                $this->review_data->write_comment($comment_data);
                $this->index();
            } else {
                $user_name = $this->session->userdata('username');
                $this->load->model('user_data');
                $user_data = $this->user_data->get_user_data($user_name); 
            // $comment_data = array(
            //     'review_id' => $this->input->post('review_id'),
            //     'user_id' => $user_data['id'],
            //     'user_name' => 
            // );
                $comment_data['user_id'] = $user_data['id'];
                $comment_data['user_name'] = $user_data['user_name'];
                $comment_data['review_id'] = $this->input->post('review_id');
                $comment_data['review_comment'] = $this->input->post('comment');
                $this->load->model('review_data');
                $this->review_data->write_comment($comment_data);
                $this->index();
            }
            
        }
       
    }

    public function like_review() {
        $review_id = $this->input->post('review_id');
        $current_like = $this->input->post('current_like');
        $this->load->model('review_data');
        $this->review_data->like_review($review_id, $current_like);
        $this->index();
    }

    public function add_wishlist() {
        $data['error']= "";
        $data['recaptcha']= "";
        if (!$this->session->userdata('logged_in')){
            $this->load->view('login_new', $data);
        } else {
            $user_name = $this->session->userdata('username');
            $this->load->model('user_data');
            $user_data = $this->user_data->get_user_data($user_name);
            $wishlist_data['user_id'] = $user_data['id'];
            $wishlist_data['user_name'] = $user_data['user_name'];
            $wishlist_data['review_id'] = $this->input->post('review_id');
            $wishlist_data['title'] = $this->input->post('title');
            $wishlist_data['review'] = $this->input->post('review');
            $this->load->model('review_data');
            $this->review_data->add_to_wishlist($wishlist_data);
            $this->index();
        }
    } 
    public function remove_wishlist() {
        $user_name = $this->session->userdata('username');
        $this->load->model('user_data');
        $user_data = $this->user_data->get_user_data($user_name);
        $user_id = $user_data['id'];
        $review_id = $this->input->post('review_id');
        $this->load->model('review_data');
        $this->review_data->remove_from_wishlist($user_id, $review_id);
        $this->index();
    }
}

?>