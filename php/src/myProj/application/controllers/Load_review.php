<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class load_review extends CI_Controller {
    function index() {
        $this->load->view('homepage');
    }

    function fetch() {
        $output = '';
        $this->load->model('review_data');
        $data = $this->review_data->fetch_data($this->input->post('limit'), $this->input->post('start'));
        if($data->num_rows() > 0) {
            foreach($data->result_array() as $row) {
            // $output .= '<div class="post_data">
            //             <h3 class="text-danger">'.$row->title.'</h3>
            //             <p>'.$row->review.'</p>
            //             </div>';
            
            
            $image_names = array();
            $image_names = explode(';', $row['image_name']);
            

            $output .=  form_open(base_url().'index.php/review_read').'<form> <div class="card mx-auto" style="width: 50rem;">
                        <div class="card-body"> <h5 class="card-title">'.'Title: '.$row['title'].'</h5>
                        <p class="card-text">'.'Review Content: '. $row['review'].'</p>
                        <p class="card-text">'.'Reviewer: '.$row['user_name'].'</p>
                        <p class="card-text">'.'Post Date: '.$row['post_date'].'</p>
                        <input type="hidden" name="review_id" value="'.$row['review_id'].'">
                        <button class="btn btn-primary" type ="submit">Read More</button>
                        </div></div><br></form>'. form_close();;
            }
        }
        echo $output;
    }
}

?>