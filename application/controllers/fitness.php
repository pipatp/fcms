<?php

class fitness extends CI_Controller {
    function fitness() {
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
    
    function getFitnessWorklist($playerCode, $date) {
        $this->load->model('fitness_model');
        
        $obj["worklistSeq"] = $this->fitness_model->hasWorklist($playerCode, $date);
        $obj["result"] = $this->fitness_model->getFitnessWorklist($playerCode, $date);
            
        $data["content"] = $obj;

        $this->load->view('json_result', $data);
    }
    
    function deleteFitnessWorklist() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('fitness_model');

        try {
            $this->fitness_model->deleteFitnessWorklist($postData["worklistSeq"],
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
        
        $this->load->model('fitness_model');
        
        $data["content"] = $this->fitness_model->searchFitnessOrder($term);
        
        $this->load->view('json_result', $data);           
    }
    
    function addFitnessWorklist() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('fitness_model');

        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->fitness_model->addFitnessWorklist($postData["worklistSeq"],
                 $postData["orderCode"], $postData["start"],
                 $postData["end"], $postData["duration"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    //----------------------------------------------
    // Fitness Record Result
    //----------------------------------------------
    function viewRecordResult() {
        $this->load->view('fit_record_result');
    }
    
    function getFitnessResult($playerCode, $date) {
        $this->load->model('fitness_model');
        
        $obj["result"] = $this->fitness_model->getFitnessResult($playerCode, $date, "FIT", "RST");
        $obj["suggestion"] = $this->fitness_model->getFitnessResult($playerCode, $date, "FIT", "SGT");
        
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
}

