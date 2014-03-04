<?php

class coach extends CI_Controller {
    function coach() {
        parent::__construct();
        
        if (!$this->session->userdata('user_login')) {
                redirect('../main/login');
        }
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
        $data["subMenuView"] = "coa_navigation";
        
        $this->load->view('coa_main', $data);
    }
    
    //----------------------------------------------
    // Coach Schedule
    //----------------------------------------------
    function viewCoachSchedule() {
        $this->load->view('coa_schedule');
    }
    
    //----------------------------------------------
    // Coach Fitness
    //----------------------------------------------
    function viewCoachFitness() {
        $this->load->view('coa_fitness');
    }
    
    //----------------------------------------------
    // Coach Physical Theraphy
    //----------------------------------------------
    function viewCoachPhysical() {
        $this->load->view('coa_physical');
    }
    
    //----------------------------------------------
    // Coach Player Info
    //----------------------------------------------
    function viewPlayerInfo() {
        $this->load->view('coa_player_info');
    }
}