<?php

class Worklist extends CI_Controller {
    public $permission;
    
    function Worklist() {
        parent::__construct();
        
        if (!$this->session->userdata('user_login')) {
                redirect('main/login');
        }
        
        if (!$this->session->userdata('user_permission')) {
            redirect('main/menu');
        }
        
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists('WKL', $perms)) {
            redirect('main/menu');
        }
        
        $this->permission = $perms["WKL"];
   }
    
    protected function getQueryStringParams() {
        parse_str($_SERVER['QUERY_STRING'], $params);
        return $params;
    }
    
    function main() {
        $loginSession = $this->session->userdata('user_login');
        
        $data["loginSession"] = $loginSession;
        $data["showMenu"] = true;
        $data["showSubMenu"] = true;
        $data["subMenuView"] = "work_navigation";
        $data["permissions"] = $this->session->userdata('user_permission');
        
        $this->load->view('work_main', $data);
    }
    
    function addWorklist() {
        
        $data["permission"] = $this->permission;     
        $this->load->view('work_addWorklist');
    }
    
    
}
