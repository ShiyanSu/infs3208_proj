<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Review_data extends CI_Model {
        public function upload_review($data = array()) {
            $upload = $this->db->insert_batch('product_review',$data); 
            return $upload;
        }

        public function upload_text_review($data) {
            $result = $this->db->insert('product_review', $data);
            $last_id = $this->db->insert_id();
            $this->session->set_userdata('current_review_id', $last_id);
            return $result;
        } 

        public function upload_image_review($imageNames) {
            $current_review_id = $this->session->userdata('current_review_id');
            $condition = "review_id =" . "'" . $current_review_id . "'";
            $this->db->set('image_name', $imageNames);
            $this->db->where($condition);
            $this->db->update('product_review');
            return TRUE;
        }
        
        public function fetch_data($limit, $start){

            $this->db->select("*");
            $this->db->from("product_review");
            $this->db->order_by("review_id", "DESC");
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query;
        }

        public function load_review($review_id) {
            //$query = $this->db->query("SELECT * FROM product_review WHERE review_id = $review_id");
            $condition = "review_id =" . "'" . $review_id . "'";
            $this->db->select("*");
            $this->db->from("product_review");
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->row_array();
        }

        public function write_comment($data) {
            $this->db->insert('review_comment', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function load_comment($review_id) {
            // $condition = "review_id =" . "'" . $review_id . "'";
            // $this->db->select("*");
            // $this->db->from("review_comment");
            // $this->db->where($condition);
            // $query = $this->db->get();
            // return $query->row_array();
            $query = $this->db->query("SELECT * FROM review_comment WHERE review_id = $review_id");
            return $query->result();
        }

        public function like_review($review_id, $current_like) {
            $this->db->set('liked_times', $current_like + 1);
            $this->db->where('review_id', $review_id);
            $this->db->update('product_review');
            return TRUE;   
        }

        public function add_to_wishlist($data) {
            $this->db->insert('wishlist', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }

        }

        public function remove_from_wishlist($user_id, $review_id) {
            $this->db->where('user_id', $user_id);
            $this->db->where('review_id', $review_id);
            $this->db->delete('wishlist');
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function check_wishlist($user_id, $review_id) {
            $query = $this->db->query("SELECT * FROM wishlist WHERE user_id = $user_id AND review_id = $review_id");
            return $query->num_rows();
        }

        public function fetch($query) {
            if($query == '') {
                return null;
            } else{
                $this->db->select("*");
                $this->db->from("files");
                $this->db->like('filename', $query);
                $this->db->or_like('username', $query);
                $this->db->order_by('filename', 'DESC');
                return $this->db->get();
            }
        }

        public function load_wishlist($user_id) {
            $query = $this->db->query("SELECT * FROM wishlist WHERE user_id = $user_id");
            return $query->result();
        }
        
    
    }

?>