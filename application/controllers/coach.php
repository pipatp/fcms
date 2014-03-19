<?php

class coach extends CI_Controller {
    public $permission;
    
    function coach() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (!$this->session->userdata('user_login')) {
            redirect('main/login');
        }
        
        if (!$this->session->userdata('user_permission')) {
            redirect('main/menu');
        }
        
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists('COA', $perms)) {
            redirect('main/menu');
        }
        
        $this->permission = $perms["COA"];
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
        $data["permission"] = $this->permission;
                
        $this->load->view('coa_schedule', $data);
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
    
    function getCoachScheduleDates($year, $month) {
        $this->load->model('coach_model');
        
        $data["content"] = $this->coach_model->getCoachScheduleDates($year, $month);
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Coach Fitness
    //----------------------------------------------
    function viewCoachFitness() {
        $data["permission"] = $this->permission;
        
        $this->load->view('coa_fitness', $data);
    }
    
    function getFitnessSchedule($date) {
        $this->load->model('coach_model');
        
        $data["content"] = $this->coach_model->getCoachViewSchedule($date, 'FIT');
        
        $this->load->view('json_result', $data);
    }
    
    function getFitnessScheduleDates($year, $month) {
        $this->load->model('coach_model');
        
        $data["content"] = $this->coach_model->getCoachViewScheduleDates($year, $month, 'FIT');
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Coach Physical Theraphy
    //----------------------------------------------
    function viewCoachPhysical() {
        $data["permission"] = $this->permission;
        
        $this->load->view('coa_physical', $data);
    }
    
    function getPhysicalSchedule($date) {
        $this->load->model('coach_model');
        
        $data["content"] = $this->coach_model->getCoachViewSchedule($date, 'PHY');
        
        $this->load->view('json_result', $data);
    }
    
    function getPhysicalScheduleDates($year, $month) {
        $this->load->model('coach_model');
        
        $data["content"] = $this->coach_model->getCoachViewScheduleDates($year, $month, 'PHY');
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Coach Player Info
    //----------------------------------------------
    function viewPlayerInfo() {
        $data["permission"] = $this->permission;
        
        $this->load->view('coa_player_info', $data);
    }
    
    function getPlayerInfo($playerCode) {
        $this->load->model('player_model');
        
        $obj["comment"] = $this->player_model->getComment($playerCode, 'COA');
        $obj["detail"] = $this->player_model->getInfo($playerCode);
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
    
    function getPlayerWorklist($playerCode, $date) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getAllWorklist($playerCode, $date);
        
        return $this->load->view('json_result', $data);
    }
    
    function getPlayerScheduleDates($playerCode, $year, $month) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getPlayerScheduleDates($playerCode, $year, $month);
        
        return $this->load->view('json_result', $data);
    }
}