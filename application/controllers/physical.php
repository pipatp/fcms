<?php

class physical extends CI_Controller {
    public $permission;
    
    function physical() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (!$this->session->userdata('user_login')) {
            redirect('main/login');
        }
        
        if (!$this->session->userdata('user_permission')) {
            redirect('main/menu');
        }
        
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists('PHY', $perms)) {
            redirect('main/menu');
        }
        
        $this->permission = $perms["PHY"];
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
        $data["subMenuView"] = "phy_navigation";
        
        $data["permissions"] = $this->session->userdata('user_permission');
        
        $this->load->view('phy_main', $data);
    }
    
        
    //----------------------------------------------
    // Physical Therapy Registration
    //----------------------------------------------
    function viewRegistration() {
        $data["permission"] = $this->permission;
        
        $this->load->view('phy_registration', $data);
    }
    
    function getPhysicalWaitingList($date) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getRegistrationList($date, "PHY", 'N');
        
        $this->load->view('json_result', $data);
    }
    
    function getPhysicalRegisteredList($date) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getRegistrationList($date, "PHY", 'Y');
        
        $this->load->view('json_result', $data);        
    }

    //----------------------------------------------
    // Physical Therapy Modification
    //----------------------------------------------
    function viewModification() {
        $this->load->model('player_model');
        
        $data["players"] = $this->player_model->getAllPlayers();
        $data["permission"] = $this->permission;
        
        $this->load->view('phy_modification', $data);
    }
    
    function getPhysicalWorklist($playerCode, $date) {
        $this->load->model('worklist_model');
        
        $obj["worklistSeq"] = $this->worklist_model->getPlayerWorklistSeq($playerCode, $date);
        $obj["result"] = $this->worklist_model->getWorklistByCategory($playerCode, $date, "PHY");
            
        $data["content"] = $obj;

        $this->load->view('json_result', $data);
    }
    
    function searchPhysicalOrder() {
        $queryParams = $this->getQueryStringParams();
        
        $term = $queryParams['term'];
        
        $this->load->model('order_model');
        
        $data["content"] = $this->order_model->searchOrder($term, "PHY");
        
        $this->load->view('json_result', $data);           
    }
    
    function addFitnessComment() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('fitness_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->fitness_model->addPlayerComment($postData["playerCode"],
                    $postData["category"], $postData["comment"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function deletePhysicalWorklist() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('worklist_model');

        try {
            $this->worklist_model->deleteWorklistItem($postData["worklistSeq"],
                 $postData["seqNum"], $postData["itemCode"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function addPhysicalWorklist() {
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
    
    function getAllWorklist($playerCode, $date) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getAllWorklist($playerCode, $date);
        
        $this->load->view('json_result', $data);
    }
    
    function getPlayerScheduleDates($playerCode, $year, $month) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getPlayerScheduleDates($playerCode, $year, $month);
        
        return $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Physical Therapy Record Result
    //----------------------------------------------
    function viewRecordResult() {
        $this->load->model('player_model');
        
        $data["players"] = $this->player_model->getAllPlayers();
        
        $data["permission"] = $this->permission;
        
        $this->load->view('phy_record_result', $data);
    }
    
    function getPhysicalResult($playerCode, $date) {
        $this->load->model('player_model');
        
        $obj["result"] = $this->player_model->getResult($playerCode, $date, "PHY", "RST");
        $obj["suggestion"] = $this->player_model->getResult($playerCode, $date, "PHY", "SGT");
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Physical Therapy Player Info
    //----------------------------------------------
    function viewPlayerInfo() {
        $this->load->model('player_model');
        
        $data["players"] = $this->player_model->getAllPlayers();
        
        $this->load->view('fit_player_info', $data);
    }
    
    function getPlayerInfo($playerCode, $date) {
        $this->load->model('worklist_model');

        $obj["schedule"] = $this->worklist_model->getAllWorklist($playerCode, $date);
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Physical Therapy Inventory
    //--
    function viewInventory() {
        $this->load->model('inventory_model');
        
        $data["inventory_items"] = $this->inventory_model->getAllInventoryItems();
        $data["inventory_department"] = "PHY";
        
        $this->load->view('nut_inventory', $data);
    }
}