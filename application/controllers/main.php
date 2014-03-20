<?php

class main extends CI_Controller {
    function main() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (uri_string() != "main/login" && uri_string() != 'main/authenticate') {
            log_message('error', "url " . uri_string());
            if (!$this->session->userdata('user_login')) {
                log_message('error', "no login");
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
            
            $permissionList = $this->user_model->getPermission($username);
            
            $permissions = permission::parsePermissions($permissionList);
                    
            $this->session->set_userdata('user_login', $loginSession);
            $this->session->set_userdata('user_permission', $permissions);
            
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
        
        $data["permissions"] = $this->session->userdata('user_permission');
        
        $this->load->view('mnu_main', $data);
    }
    
    function logout() {
        $this->session->unset_userdata('user_login');
        $this->session->unset_userdata('user_permission');
    }
}

