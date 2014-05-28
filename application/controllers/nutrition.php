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
        
//        $data["content"] = $this->nutrition_model->getRegistrationWaitingList($mealVal, $currentDate);
        $data["content"] = $this->nutrition_model->getRegistrationList($mealVal, $currentDate, 'N');
        
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
        $this->load->model('nutrition_model');
        
        $data["food_items"] = $this->nutrition_model->getAllFoodMeal();
//        $data["playerPlans"] = $this->nutrition_model->getNutritionPlan($yearMonth);
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
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];

        $data["content"] = $this->nutrition_model->saveFoodMealItem($postData["yearMonth"],
             $postData["day"], $postData["weekDay"], $postData["type"],
             $postData["code"], $user);
        
        $this->load->view('json_result', $data);
    }
    
    
    function updateAssessment() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];

        $data["content"] = $this->nutrition_model->saveAssessment($postData["playerCode"], $postData["date"], $postData["bmi"], $postData["body"], $postData["weight"],  $postData["diet"] ,
                 $postData["grain"], $postData["protein"], $postData["fat"], $postData["milk"], $postData["fruit"], $postData["veg"], $postData["fluid"],  $user);
        
        $this->load->view('json_result', $data);
    }
    
    
//        function updateCommentAssessment() {
//        $postData = json_decode(trim(file_get_contents('php://input')), true);
//        
//        $this->load->model('nutrition_model');
//        
//        $loginSession = $this->session->userdata('user_login');
//        $user = $loginSession["username"];
//        
//        try {
//            $this->nutrition_model->updateCommentAssessment($postData["playerCode"],
//                    $postData["date"], $postData["category"],$postData["comment"], $user);
//        } catch (Exception $e) {
//            $this->output->set_status_header('500', 'Delete item failed.');
//        }
//    }
    
    
    function deleteFoodMealItem() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('nutrition_model');

        try {
            $this->nutrition_model->deleteFoodMealItem($postData["mealSeq"],
                 $postData["itemSeq"]);
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
    
    function getPreparationScheduleDates($year, $month) {
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getPreparationScheduleDates($year, $month);
        
        return $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Meal Modification
    //----------------------------------------------
    function viewMealModification() {
        $data["permission"] = $this->permission;
        
        $this->load->model('player_model');
        
        $data["players"] = $this->player_model->getAllPlayers();
        
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
    // Nutrition Record Result
    //----------------------------------------------
    function viewNutritionRecordResult() {
        $this->load->model('player_model');
        
        $data["players"] = $this->player_model->getAllPlayers();
        $data["permission"] = $this->permission;
        
        $this->load->view('nut_record_result', $data);
    }
    
    function getNutritionResult($playerCode, $date) {
        $this->load->model('player_model');
        
        $obj["result"] = $this->player_model->getResult($playerCode, $date, "NUT", "RST");
        $obj["suggestion"] = $this->player_model->getResult($playerCode, $date, "NUT", "SGT");
        
        $obj["lab"] = $this->player_model->getResult($playerCode, $date, "NUT", "LAB");
        $obj["food"] = $this->player_model->getResult($playerCode, $date, "NUT", "FOD");
        $obj["knowledge"] = $this->player_model->getResult($playerCode, $date, "NUT", "KNO");
        $obj["supplement"] = $this->player_model->getResult($playerCode, $date, "NUT", "SUP");
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
    
    
    function getNutritionHistoryResult($playerCode) {
        $this->load->model('player_model');
        
        $obj["results"] = $this->player_model->getHistoryResult($playerCode, "NUT", "RST");
        $obj["suggestions"] = $this->player_model->getHistoryResult($playerCode, "NUT", "SGT");
        
        $data["content"] = $obj;
        
        $this->load->view('json_result', $data);
    }
    
    //----------------------------------------------
    // Nutrition Plan
    //----------------------------------------------
    function viewNutritionPlan() {
        $this->load->model('player_model');
        $this->load->model('nutrition_model');
        
        $data["players"] = $this->player_model->getAllPlayers();
        $planMonths = $this->nutrition_model->getNutritionPlanMonth();
        
        if (count($planMonths) > 0) {
            $month = $planMonths[count($planMonths) - 1]->NmpYeaMon;
            $data["playerPlans"] = $this->nutrition_model->getNutritionPlan($month);
        }
        $data["planMonths"] = $planMonths;
        $data["permission"] = $this->permission;
        
        $this->load->view('nut_plan', $data);
    }
    
    function createNutritionPlan($yearMonth) {
        $this->load->model('nutrition_model');
        
        $this->nutrition_model->createNutritionPlan($yearMonth);
    }
    
    function getNutritionPlan($yearMonth) {
        $this->load->model('nutrition_model');
        
        $data["playerPlans"] = $this->nutrition_model->getNutritionPlan($yearMonth);
        
        $currentMonth = date('Ym');
        
        if ($currentMonth == $yearMonth && $this->permission["write"] == 1) {
            $this->load->view('nut_plan_edit', $data);
        }
        else {
            $this->load->view('nut_plan_view', $data);
        }
    }
    
    function saveNutritionPlan() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);

        $this->load->model('nutrition_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];

        $data = $postData["playerData"];
        
        for ($index=0; $index<count($data); $index++) {
            $p = $data[$index];
            
            $this->nutrition_model->saveNutritionPlan($postData["yearMonth"],
                $p["playerCode"], $p["mealSet"], $p["weight"],
                $p["calorie"], $p["milk"], $p["meat"], $p["fruit"],
                $p["veggie"], $p["rice"], $p["lipid"], $user);
        }
//        
//        $this->nutrition_model->saveNutritionPlan($postData["yearMonth"],
//             $postData["playerCode"], $postData["mealSet"], $postData["weight"],
//             $postData["calorie"], $postData["milk"], $postData["meat"], $postData["fruit"],
//             $postData["veggie"], $postData["rice"], $postData["lipid"], $user);
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
    
        function getAssessment($playerCode,$date){
        $this->load->model('nutrition_model');
        
        $data["content"] = $this->nutrition_model->getPlayerAssessment($playerCode, $date);
        
        $this->load->view('json_result', $data);
    }
    
    
}