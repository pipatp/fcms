<?php

class nutrition extends CI_Controller {
    public $permission;
    
    function nutrition() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (!$this->session->userdata('user_login')) {
                redirect('main/login');
        }
        
        if (!$this->session->userdata('user_permission')) {
            redirect('main/menu');
        }
        
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists('NUT', $perms)) {
            redirect('main/menu');
        }
        
        $this->permission = $perms["NUT"];
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
        $data["subMenuView"] = "nut_navigation";
        
        $data["permissions"] = $this->session->userdata('user_permission');
        
        $this->load->view('nut_main', $data);
    }
    
    //----------------------------------------------
    // Food Registration
    //----------------------------------------------
    function viewRegistration() {
        $this->load->view('nut_registration');
    }
    
    function getRegistrationWaitingList($mealVal) {
        $this->load->model('nutrition_model');
        
        $currentDate = date("Ymd");
        
        $data["content"] = $this->nutrition_model->getRegistrationWaitingList($mealVal, $currentDate);
        
        $this->load->view('json_result', $data);
    }
    
    function getRegistrationReceiveList($mealVal) {
        $this->load->model('nutrition_model');
        
        $currentDate = date("Ymd");
        
        $data["content"] = $this->nutrition_model->getRegistrationReceiveList($mealVal, $currentDate);
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Food Preparation
    //----------------------------------------------
    function viewPreparation() {
        $data["permission"] = $this->permission;
        
        $this->load->view('nut_preparation', $data);
    }
    
    function getFoodMealSet($yearMonth, $day) {
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getFoodMealSet($yearMonth, $day);
        
        $this->load->view('json_result', $data);        
    }
    
    function findFoodMealItem() {
        $queryParams = $this->getQueryStringParams();
        
        $term = $queryParams['term'];
        
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->findFoodMealItem($term);
        
        $this->load->view('json_result', $data);        
    }
    
    function addFoodMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');

        $data["content"] = $this->nutrition_model->saveFoodMealItem($postData["yearMonth"],
             $postData["day"], $postData["weekDay"], $postData["type"],
             $postData["code"], $postData["weight"], $postData["calorie"]);
        
        $this->load->view('json_result', $data);
    }
    
    function deleteFoodMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');

        try {
            $this->nutrition_model->deleteFoodMealItem($postData["yearMonth"],
                 $postData["day"], $postData["weekDay"], $postData["type"],
                 $postData["code"]);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
    
    function getTodayMealPreparation($date, $mealType) {
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getTodayMealPreparation($date, $mealType);
        
        $this->load->view('json_result', $data);
    }
    
    function getPlayerScheduleDates($playerCode, $year, $month) {
        $this->load->model('worklist_model');
        
        $data["content"] = $this->worklist_model->getPlayerScheduleDates($playerCode, $year, $month);
        
        return $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Meal Modification
    //----------------------------------------------
    function viewMealModification() {
        $data["permission"] = $this->permission;
        
        $this->load->view('nut_modification', $data);
    }
    
    function findPlayer() {
        $queryParams = $this->getQueryStringParams();
        
        $term = $queryParams['term'];
        
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->findPlayer($term);
        
        $this->load->view('json_result', $data);        
    }
    
    function getPlayerMealSet($playerCode, $yearMonth, $day) {
        $this->load->model('nutrition_model');
        
        $date = $yearMonth . $day;
        
        $data["content"] = $this->nutrition_model->getPlayerMealSet($playerCode, $date);

        $this->load->view('json_result', $data);        
    }
    
    function getPlayerWorklistMeal($playerCode, $yearMonth, $day) {
        $this->load->model('nutrition_model');
        
        $date = $yearMonth . $day;
        
        $data["content"] = $this->nutrition_model->getPlayerWorklistMeal($playerCode, $date);

        $this->load->view('json_result', $data);        
   }
    
    function addPlayerMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);

        $this->load->model('nutrition_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];

        $data["content"] = $this->nutrition_model->addPlayerMealItem($postData["playerCode"],
             $postData["yearMonth"], $postData["day"], $postData["orderCode"],
             $postData["mealCode"], $postData["weight"], $postData["calorie"], $user);

        $this->load->view('json_result', $data);
    }
    
    function deletePlayerMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');
        
        $this->nutrition_model->deletePlayerMealItem($postData["worklistSeq"],
             $postData["orderCode"], $postData["mealSeq"]);
    }
    
    function editPlayerMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);

        $this->load->model('nutrition_model');

        $this->nutrition_model->editPlayerMealItem($postData["worklistSeq"],
             $postData["orderCode"], $postData["mealSeq"], $postData["code"], 
             $postData["weight"], $postData["calorie"]);
    }
    
    //----------------------------------------------
    // Meal Inventory
    //----------------------------------------------
    function viewInventory() {
        $this->load->model('inventory_model');
        
        $data["inventory_items"] = $this->inventory_model->getAllInventoryItems();
        $data["inventory_department"] = "NUT";
        
        $this->load->view('nut_inventory', $data);
    }
    
    function storeInInventory() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('inventory_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];

        try {
            $this->inventory_model->addStoreInTransaction($postData["date"],
                $postData["category"], $postData["type"], $postData["department"],
                $postData["remark"], $user, $postData["items"]);
        } catch (Exception $e) {
            show_error($e->getMessage(), 500);
        }
    }
    
    function deliverInventory() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('inventory_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];

        try {
            $result = $this->inventory_model->addDeliverTransaction($postData["date"],
                        $postData["category"], $postData["type"], $postData["department"],
                        $postData["remark"], $user, $postData["items"]);
            
            if (!$result) {
                show_error("Deliver item is not enought", 403);
            }
        } catch (Exception $e) {
            show_error($e->getMessage(), 500);
        }
    }
    
    function getInvetoryStock($category) {
        $this->load->model('inventory_model');
        
        $data["content"] = $this->inventory_model->getInvetoryStock($category);
        
        $this->load->view('json_result', $data);
    }
    
    function getExpireInventoryItems($category) {
        $this->load->model('inventory_model');
        
        $data["content"] = $this->inventory_model->getExpireInventoryItems($category);
        
        $this->load->view('json_result', $data);
    }
    
    function deliverExpireInventoryItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('inventory_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $result = $this->inventory_model->deliverExpireInventoryItem($postData["date"],
                        $postData["category"], $postData["type"], $postData["department"],
                        $postData["remark"], $user, $postData["itemSeq"], $postData["itemAmount"]);
            
            if (!$result) {
                show_error("Deliver expire item is invalid state", 403);
            }
        } catch (Exception $e) {
            show_error($e->getMessage(), 500);
        }
    }
}