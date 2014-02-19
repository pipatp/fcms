<?php

class fitness extends CI_Controller {
    function fitness() {
        parent::__construct();
        
        if (!$this->session->userdata('user_login')) {
                redirect('../main/login');
        }
    }
    
    function main() {
        $loginSession = $this->session->userdata('user_login');
        
        $data["loginSession"] = $loginSession;
        $data["showMenu"] = true;
        $data["showSubMenu"] = true;
        $data["subMenuView"] = "fit_navigation";
        
        $this->load->view('fit_main', $data);
    }
}

