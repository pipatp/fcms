<?php

class nutrition extends CI_Controller {
    function nutrition() {
        parent::__construct();
    }
    
    protected function getQueryStringParams() {
        parse_str($_SERVER['QUERY_STRING'], $params);
        return $params;
    }
    
    //----------------------------------------------
    // Food Registration
    //----------------------------------------------
    function viewRegistration() {
        $this->load->view('nut_registration');
    }
    
    function getRegistrationWaitingList($mealVal) {
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getRegistrationWaitingList($mealVal);
        
        $this->load->view('json_result', $data);
    }
    
    function getRegistrationReceiveList($mealVal) {
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getRegistrationReceiveList($mealVal);
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Food Preparation
    //----------------------------------------------
    function viewPreparation() {
        $this->load->view('nut_preparation');
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
        $this->load->model('nutrition_model');
        
        $data['mealTypes'] = $this->nutrition_model->getMealTypes();
             
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
}
