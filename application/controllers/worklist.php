<?php

class worklist extends CI_Controller {
    public $permission;
    
    function worklist() {
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
    
    //----------------------------------------------
    // Worklist Schedule
    //----------------------------------------------
    function viewWorklistSchedule() {
        $this->load->model('order_model');
        
        $data["orders"] = $this->order_model->getAllOrders();
        $data["permission"] = $this->permission;
        
        $this->load->view('work_schedule', $data);
    }
    
    function getTeamWorklistSchedule($date) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getTeamWorklistSchedule($date);
        
        $this->load->view('json_result', $data);
    }
    
    function addTeamWorklistItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('worklist_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        $data["content"] = $this->worklist_model->addTeamWorklistItem($postData["date"], $postData["orderCode"], $postData["start"],
                $postData["end"], $postData["duration"], $user);
        
        $this->load->view('json_result', $data);
    }
    
    function generateWorklistToPlayers() {
        try {
            $postData = json_decode(trim(file_get_contents('php://input')), true);

            $this->load->model('worklist_model');

            $loginSession = $this->session->userdata('user_login');
            $user = $loginSession["username"];

            $this->worklist_model->generateWorklistToPlayers($postData["date"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Generate worklist failed.');
        }
    }
}
