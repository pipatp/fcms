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
    
    function getCoachSchedule($date) {
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        $this->load->model('coach_model');
        
        $obj["appointment"] = $this->coach_model->getCoachAppointmentInfo($user, $date);
        
        $obj["worklist"] = (count($obj["appointment"]) > 0) ? $this->coach_model->getCoachWorklistInfo($obj["appointment"]->CapSeqNum) : array();
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
    
    function addCoachWorklistItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        $this->load->model('coach_model');

        try {
            $this->coach_model->addCoachWorklistItem($postData["date"], $postData["startTime"],
                 $postData["endTime"], $postData["detail"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Add item failed. ' . $e->getMessage());
        }
    }
    
    function deleteCoachWorklistItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('coach_model');

        try {
            $this->coach_model->deleteCoachWorklistItem($postData["appointmentSeq"],
                 $postData["itemSeq"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed. ' . $e->getMessage());
        }
    }
    
    function updateCoachScheduleDetail() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('coach_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->coach_model->updateCoachScheduleDetail($user,
                 $postData["date"], $postData["detail"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed. ' . $e->getMessage());
        }
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