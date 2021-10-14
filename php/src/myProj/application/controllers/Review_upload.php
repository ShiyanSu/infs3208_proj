<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class review_upload extends CI_Controller {
    public function index() {
        $data['error']= "";
        if (!$this->session->userdata('logged_in')){
            $this->load->view('login_new', $data);
        } else {
            $this->load->view('review_upload');
            $this->load->view('footer');
        }
    }

    public function post_review() {
        $this->load->model('review_data');
        $this->load->model('user_data');
        $uploadImgData = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->user_data->get_user_id_by_name($this->session->userdata('username'));

        $uploadImgData = array(
            'title' => $this->input->post('title'),
            'category' => $this->input->post('category'),
            'review' => $this->input->post('review'),
            'user_name' => $this->session->userdata('username'),
            'user_id' => $user_id,
            'post_data' => date("Y-m-d H:i:s")
        );

        $this->load->library('upload');

        $ImageCount = count($_FILES['image_name']['name']);
        echo $ImageCount;
        if ($ImageCount == 0) {
            echo 'ewde';
        }

        for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
            $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];


            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "jpg|png|jpeg",
                //'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "7680",
                'max_width' => "10240"
            );
    
            $this->load->library('upload', $config);

           
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                $uploadImgData[$i]['image_name'] = $imageData['file_name'];
                $uploadImgData[$i]['post_data'] = date("Y-m-d H:i:s"); 
            }

            if(!empty($uploadImgData)){
                // Insert files data into the database
                $this->review_data->upload_review($uploadImgData);              
            }
        }


    }

    public function post_text_review() {
        $this->load->model('review_data');
        $this->load->model('user_data');
        $user_data = $this->user_data->get_user_data($this->session->userdata('username'));
        //$user_id = $this->user_data->get_user_id_by_name($this->session->userdata('username'));

        $data = array(
            'title' => $this->input->post('title'),
            'category' => $this->input->post('category'),
            'review' => $this->input->post('review'),
            'user_name' => $this->session->userdata('username'),
            'user_id' => $user_data['id'],
            'post_date' => date("Y-m-d H:i:s")
        );

        $this->load->model('review_data');
        $this->review_data->upload_text_review($data);
        $this->load->view('review_upload_image');
        $this->load->view('footer');
    }

    public function post_image_review() {
        $this->load->model('review_data');
        $uploadImgData = array(); 
        $imageNames = '';
        $imageCount = count($_FILES['image_name']['name']);
        for ($i = 0; $i < $imageCount; $i++) {
            $_FILES['file']['name'] = $_FILES['image_name']['name'][$i];
            $_FILES['file']['type'] = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size'] = $_FILES['image_name']['size'][$i];

            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "jpg|png|jpeg",
                //'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "7680",
                'max_width' => "10240"
            );
    
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $uploadImgData[$i]['image_name'] = $_FILES['file']['name'];
                $imageNames = $imageNames.";".$uploadImgData[$i]['image_name'];
            }
        }
        
        echo json_encode($uploadImgData);
        $this->review_data->upload_image_review($imageNames);


    }


    // public function p() {
    //     $count = count($_FILES['image_name']['name']);
    //     $data = [];
    //     $imgIDs = "";
	// 	for ($i = 0; $i < $count; $i++) {

	// 		$_FILES['f']['name'] = $_FILES['image_name']['name'][$i];
	// 		$_FILES['f']['type'] = $_FILES['image_name']['type'][$i];
	// 		$_FILES['f']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
	// 		$_FILES['f']['error'] = $_FILES['image_name']['error'][$i];
	// 		$_FILES['f']['size'] = $_FILES['image_name']['size'][$i];
			
	// 		$config['upload_path'] = './uploads/'; 
	// 		$config['allowed_types'] = 'jpg|jpeg|png|gif|mp4';
	// 		$config['max_size']             = 1000;
    //         $config['max_width']            = 10240;
    //         $config['max_height']           = 7680;
			
	// 		$this->load->library('upload',$config); 
    //         $this->upload->do_upload('f');
    //         $data[$i]['name'] = $_FILES['f']['name'];
    //         $imgIDs = $imgIDs.";".$data[$i]['name'];
			
	// 	}

    //     //$this->load->model('review_data');
    //     //$this->review_data->upload_image_review($imgIDs);
	// 	echo json_encode($data);
    // }

    public function post_image() {

      
//         $count = count($_FILES['file']['name']);
//         $data = [];
//         for ($i = 0; $i < $count;$i++){

//             $_FILES['f']['name'] = $_FILES['file']['name'][$i];
//             $_FILES['f']['type'] = $_FILES['file']['type'][$i];
//             $_FILES['f']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
//             $_FILES['f']['error'] = $_FILES['file']['error'][$i];
//             $_FILES['f']['size'] = $_FILES['file']['size'][$i];
//             
//             $config['upload_path'] = './files/img/'; 
//             $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4';
//             $config['max_size']             = 1000;
//             $config['max_width']            = 10240;
//             $config['max_height']           = 7680;
//             
//             $this->load->library('upload',$config); 
//             
//             $this->upload->do_upload('f');
//             $data[$i]['name'] = $_FILES['f']['name'];
//             
//         }

//         echo json_encode($data);

       
        $this->load->model('review_data');
        $this->load->model('user_data');
        $uploadImgData = array(); 
        $errorUploadType = $statusMsg = ''; 
        
        $data = [];

        $ImageCount = count($_FILES['image_name']['name']);
        for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['image_name']['name'][$i];
            $_FILES['file']['type']       = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size']       = $_FILES['image_name']['size'][$i];


            $config = array(
                'upload_path' => "./uploads/",
                'allowed_types' => "jpg|png|jpeg",
                //'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "7680",
                'max_width' => "10240"
            );
    
            $this->load->library('upload', $config);

           
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $imageData = $this->upload->data();
                $uploadImgData[$i]['image_name'] = $imageData['file_name'];
                $uploadImgData[$i]['post_data'] = date("Y-m-d H:i:s"); 
                echo json_encode($data);
            }

            if(!empty($uploadImgData)){
                // Insert files data into the database
                $this->review_data->upload_review($uploadImgData);              
            }
        }

        
    }
}

?>