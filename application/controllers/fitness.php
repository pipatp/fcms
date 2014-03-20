<?php

class fitness extends CI_Controller {
    public $permission;
    
    function fitness() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (!$this->session->userdata('user_login')) {
                redirect('main/login');
        }
        
        if (!$this->session->userdata('user_permission')) {
            redirect('main/menu');
        }
        
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists('FIT', $perms)) {
            redirect('main/menu');
        }
        
        $this->permission = $perms["FIT"];
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
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getRegistrationList($date, "FIT", 'N');
        
        $this->load->view('json_result', $data);
    }
    
    function getFitnessRegisteredList($date) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getRegistrationList($date, "FIT", 'Y');
        
        $this->load->view('json_result', $data);        
    }

    //----------------------------------------------
    // Fitness Modification
    //----------------------------------------------
    function viewModification() {
        $data["permission"] = $this->permission;
        
        $this->load->view('fit_modification', $data);
    }
    
    function getFitnessWorklist($playerCode, $date) {
        $this->load->model('worklist_model');
        
        $obj["worklistSeq"] = $this->worklist_model->getPlayerWorklistSeq($playerCode, $date);
        $obj["result"] = $this->worklist_model->getWorklistByCategory($playerCode, $date, "FIT");
            
        $data["content"] = $obj;

        $this->load->view('json_result', $data);
    }
    
    function deleteFitnessWorklist() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('worklist_model');

        try {
            $this->worklist_model->deleteWorklistItem($postData["worklistSeq"],
                 $postData["seqNum"], $postData["itemCode"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function getAllWorklist($playerCode, $date) {
        $this->load->model('fitness_model');
        
        $data["content"] = $this->fitness_model->getAllWorklist($playerCode, $date);
        
        $this->load->view('json_result', $data);
    }
    
    function searchFitnessOrder() {
        $queryParams = $this->getQueryStringParams();
        
        $term = $queryParams['term'];
        
        $this->load->model('order_model');
        
        $data["content"] = $this->order_model->searchOrder($term, "FIT");
        
        $this->load->view('json_result', $data);           
    }
    
    function addFitnessWorklist() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('worklist_model');

        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->worklist_model->addWorklistItemWithAutoAddPlayerWorklist($postData["playerCode"],
                 $postData["date"], $postData["orderCode"], $postData["start"],
                 $postData["end"], $postData["duration"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function addFitnessComment() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('player_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->player_model->addComment($postData["playerCode"],
                    $postData["category"], $postData["comment"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function getPlayerScheduleDates($playerCode, $year, $month) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getPlayerScheduleDates($playerCode, $year, $month);
        
        return $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Fitness Record Result
    //----------------------------------------------
    function viewRecordResult() {
        $data["permission"] = $this->permission;
        
        $this->load->view('fit_record_result', $data);
    }
    
    function getFitnessResult($playerCode, $date) {
        $this->load->model('player_model');
        
        $obj["result"] = $this->player_model->getResult($playerCode, $date, "FIT", "RST");
        $obj["suggestion"] = $this->player_model->getResult($playerCode, $date, "FIT", "SGT");
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
    
    function addFitnessResult() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('fitness_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->fitness_model->addFitnessResult($postData["playerCode"],
                    $postData["date"], $postData["comment"], 
                    $postData["category"], $postData["subcategory"],
                    user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }

    //----------------------------------------------
    // Fitness Player Info
    //----------------------------------------------
    function viewPlayerInfo() {
        $this->load->view('fit_player_info');
    }
    
    function getPlayerInfo($playerCode, $date) {
        $this->load->model('fitness_model');

        $obj["schedule"] = $this->fitness_model->getAllWorklist($playerCode, $date);
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
}

