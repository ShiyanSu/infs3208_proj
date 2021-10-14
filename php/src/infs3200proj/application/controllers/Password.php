<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Class Access
 */
class Access extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function create_account()
    {
        if ($this->input->post())
        {
            $this->load->library('form_validation');
            $rules = array(
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'callback_valid_password',
                ],
                [
                    'field' => 'repeat_password',
                    'label' => 'Repeat Password',
                    'rules' => 'matches[password]',
                ],
            );
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run())
            {
                echo 'Success! Account can be created.';
            }
            else
            {
                echo 'Error! <ul>' . validation_errors('<li>', '</li>') . '</ul>';
            }
        }
        // Load your views
    }
    /**
     * Validate the password
     *
     * @param string $password
     *
     * @return bool
     */
    public function valid_password($password = '')
    {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 5)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }
  
} 