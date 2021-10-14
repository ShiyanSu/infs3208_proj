<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User_data extends CI_Model {
        
        public function create_user($data) {
            $condition = "user_name =" . "'" . $data['user_name'] . "'";
            $this->db->select('*');
            $this->db->from('user_information');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if($query->num_rows() == 0) {
                $this->db->insert('user_information', $data);
                if ($this->db->affected_rows() > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public function login($data) {

            $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
            $this->db->select('*');
            $this->db->from('user_information');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            
            if ($query->num_rows() == 1) {
            return true;
            } else {
            return false;
            }
        }

        public function get_user_data($username) {
            $condition = "user_name =" . "'" . $username. "'";
            $this->db->select('id, user_name, user_email, user_image, email_verified');
            $this->db->from('user_information');
            $this->db->where($condition);
            $query = $this->db->get();
            return $query->row_array();
        }

        public function update_user_data($username, $email_update) {
            //$this->db->from('user_information');
            $this->db->set('user_email', $email_update);
            $this->db->where('user_name', $username);
            $this->db->update('user_information');

            return TRUE;
        }

        public function upload_user_image($username, $user_image, $image_path) {
            $this->db->set('user_image', $user_image);
            $this->db->set('image_path', $image_path);
            $this->db->where('user_name', $username);
            $this->db->update('user_information');
            return TRUE;
        }

        public function verify_email($username) {
            $this->db->set('email_verified', 1);
            $this->db->where('user_name', $username);
            $this->db->update('user_information');
            return TRUE;
        }

        // public function get_user_id_by_name($username) {
        //     $condition = "user_name =" . "'" . $username. "'";
        //     $this->db->select('id');
        //     $this->db->from('user_information');
        //     $this->db->where($condition);
        //     $query = $this->db->get();
        //     return $query;
        // }

        public function check_email($email) {
            $this->db->where('user_email', $email);
            $result = $this->db->get('user_information');
            if ($result->num_rows() == 1) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        public function reset_password($username, $password) {
            $this->db->set('user_password', $password);
            $this->db->where('user_name', $username);
            $this->db->update('user_information');
            return TRUE;
           
        }

        public function get_password($username) {
            // $this->db->select('user_password');
            // $this->db->from('user_information');
            // $this->db->where('user_name', $username);
            
            $query = $this->db->query("SELECT user_password AS password FROM user_information WHERE user_name = '$username'");
            if ($query->num_rows() >= 1) {
                return $query->row()->password;
            }
            
        }
        
    }
?>
