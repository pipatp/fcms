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
    
    //----------------------------------------------
    // Fitness Registration
    //----------------------------------------------
    function viewRegistration() {
        $this->load->view('fit_registration');
    }
    
    function getFitnessWaitingList($date) {
        $this->load->model('fitness_model');
        
        $data["content"] = $this->fitness_model->getFitnessRegistrationList($date, 'N');
        
        $this->load->view('json_result', $data);
    }
    
    function getFitnessRegisteredList($date) {
        $this->load->model('fitness_model');
        
        $data["content"] = $this->fitness_model->getFitnessRegistrationList($date, 'Y');
        
        $this->load->view('json_result', $data);        
    }

    //----------------------------------------------
    // Fitness Modification
    //----------------------------------------------
    function viewModification() {
        $this->load->view('fit_modification');
    }
    
    //----------------------------------------------
    // Fitness Record Result
    //----------------------------------------------
    function viewRecordResult() {
        $this->load->view('fit_record_result');
    }

    //----------------------------------------------
    // Fitness Player Info
    //----------------------------------------------
    function viewPlayerInfo() {
        $this->load->view('fit_player_info');
    }
}

