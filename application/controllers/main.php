<?php

class main extends CI_Controller {
    function main() {
        parent::__construct();
        
        if (uri_string() != "main/login" && uri_string() != 'main/authenticate') {
            if (!$this->session->userdata('user_login')) {
                redirect('main/login');
            }
        }
    }
    
    //---------------------------------------------------------------------
    //
    // Login Page
    //
    //---------------------------------------------------------------------
    
    function login() {
        $this->load->view('mnu_login');
    }
    
    function authenticate() {
        $this->load->model('user_model');
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if ($this->user_model->authenticate($username, $password)) {
            $loginSession = array('username' => $username);
            
            $this->session->set_userdata('user_login', $loginSession);
            
            $authSession["content"] = array('isAuth' => true);
            
            $this->load->view('json_result', $authSession);
        } else {
            $this->output->set_status_header('401', 'Authentication failed. Username or password is incorrect.');
        }
    }
    
    //---------------------------------------------------------------------
    //
    // Main Menu
    //
    //---------------------------------------------------------------------
    
    function menu() {
        $loginSession = $this->session->userdata('user_login');
        
        $data["loginSession"] = $loginSession;
        
        $this->load->view('mnu_main', $data);
    }
    
    function logout() {
        $this->session->unset_userdata('user_login');
    }
}

