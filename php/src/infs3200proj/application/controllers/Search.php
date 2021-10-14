<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class search extends CI_Controller {
    public function fetch()
    {
		$this->load->model('file_model'); // load file_model 
        $output = '';
        $query = '';
        if($this->input->get('query')){ 
            $query = $this->input->get('query'); // get search query send from ajax search form
        }
        $data = $this->file_model->fetch($query); //send query to file_model and put result to $data
            if(!$data == null){
                echo json_encode ($data->result()); //send result back
            }else{
                echo  ""; // no result found
            }
    }
} 

?>