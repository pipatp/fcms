<?php

class Director extends CI_Controller {
    public $permission;
    
    function Director() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (!$this->session->userdata('user_login')) {
                redirect('main/login');
        }
        
        if (!$this->session->userdata('user_permission')) {
            redirect('main/menu');
        }
        
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists('DIR', $perms)) {
            redirect('main/menu');
        }
        
        $this->permission = $perms["DIR"];
        
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
        $data["subMenuView"] = "dir_navigation";
        
        
        $data["permissions"] = $this->session->userdata('user_permission');
        
        
        $this->load->view('dir_main', $data);
    }
    
    //----------------------------------------------
    // Food Registration
    //----------------------------------------------
    function viewRegistration() {
        $this->load->view('dir_player_info');
    }
    
     function viewCoachSchedule() {
        $this->load->view('dir_schedule');
    }
    
     function viewCoachPhysical() {
        $this->load->view('dir_physical');
    }
    
    function viewCoachFitness() {
        $this->load->view('dir_fitness');
    }
    
    function viewNutrition() {
        $this->load->view('dir_nutrition');
    }
    
    
    
    function getNutritionSchedule($date) {
        $this->load->model('director_model');
        
        $data["content"] = $this->director_model->getCoachViewSchedule($date,'NUT');
        
        $this->load->view('json_result', $data);
    }
    
    function getPhysicalSchedule($date) {
        $this->load->model('director_model');
        
        $data["content"] = $this->director_model->getCoachViewSchedule($date,'PHY');
        
        $this->load->view('json_result', $data);
    }
    
        function getFitnessSchedule($date) {
        $this->load->model('director_model');
        
        $data["content"] = $this->director_model->getCoachViewSchedule($date, 'FIT');
        
        $this->load->view('json_result', $data);
    }
    
    function getPlayerInfo($playerCode) {
        $this->load->model('player_model');
        
        $data["content"] = $this->player_model->getInfo($playerCode);
        
        
        $this->load->view('json_result', $data);
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
        $this->load->view('mas_history');
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
    
    //----------------------------------------------
    // Meal Modification
    //----------------------------------------------
    function viewMealModification() {
 //       $this->load->model('nutrition_model');
             
        $this->load->view('mas_cate');
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

        $data["content"] = $this->nutrition_model->addPlayerMealItem($postData["worklistSeq"],
             $postData["orderCode"], $postData["code"], $postData["weight"],
             $postData["calorie"], $postData["yearMonth"], $postData["day"]);

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
        $this->load->view('dir_player_report');
    }
    
    //----------------------------------------------
    // Director Alert View
    //----------------------------------------------
    function viewAlert() {
        $data["permission"] = $this->permission;
        
        $this->load->view('dir_alert', $data);
    }
}
