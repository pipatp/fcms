<?php

class nutrition_model extends CI_Model {
    function nutrition_model() {
        parent::__construct();
        
        $this->load->database();
    }

    //----------------------------------------------
    // Food Registration
    //----------------------------------------------    
    function getRegistrationWaitingList($meal, $currentDate) {
        $data = array($meal, $currentDate);
         
        $query = $this->db->query("CALL fn_getRegistrationWaitingList(?, ?)", $data);
        
        return $query->result();
    }
    
    function getRegistrationReceiveList($meal, $currentDate) {
        $data = array($meal, $currentDate);
         
        $query = $this->db->query("CALL fn_getRegistrationReceiveList(?, ?)", $data);
        
        return $query->result();
    }
    
    function getRegistrationList($meal, $date, $status) {
        $data = array($meal, $date, $status);
         
        $query = $this->db->query("CALL fn_getRegistrationList(?, ?, ?)", $data);
        
        return $query->result();
    }
    //----------------------------------------------
    // Food Preparation
    //----------------------------------------------

    // Monthly Tab
    function getFoodMealSet($yearMonth, $day) {
        $data = array($yearMonth, $day);
        
        $query = $this->db->query("CALL fn_getFoodMealSet(?, ?)", $data);
        
        return $query->result();
    }
    
    function findFoodMealItem($term) {
        $data = array($term);
        
        $query = $this->db->query("CALL fn_findFoodMeal(?)", $data);
        
        return $query->result();
    }
    
    function saveFoodMealItem($yearMonth, $day, $weekDay, $type, $itemCode, $weight, $calorie, $group, $user) {
        $data = array($yearMonth, $day, $weekDay, $type, $itemCode, $weight, $calorie, $group, $user);
        
        $query = $this->db->query("CALL fn_saveFoodMeal(?, ?, ?, ?, ?, ?, ?, ?, ?)", $data);
        
        return $query->row();
    }
    
    function deleteFoodMealItem($mealSeq, $itemSeq) {
        $data = array($mealSeq, $itemSeq);
        
        $query = $this->db->query("CALL fn_deleteFoodMeal(?, ?)", $data);
        
        $query->row();
    }
    
    function getPreparationScheduleDates($year, $month) {
        $yearMonth = $year . $month;
        
        $data = array($yearMonth);
        
        $query = $this->db->query("CALL fn_getPreparationScheduleDates(?)", $data);
        
        return $query->result();
    }
    
    function getAllFoodMeal() {
        $query = $this->db->query("CALL fn_getAllFoodMeal()");
        
        return $query->result();
    }
    
    function copyMealItems($copyDate, $targetDate, $user) {
        $data = array($copyDate, $targetDate, $user);
        
        $this->db->query("CALL fn_copyFoodMeals(?, ?, ?)", $data);
    }
    
    function applyMealItems($yaerMonth, $user) {
        $data = array($yaerMonth, $user);
        
        $query = $this->db->query("CALL fn_applyMealItems(?, ?)", $data);
        
        $query->result();
    }
    
    // Today Tab
    function getTodayMealPreparation($date, $mealType) {
        $data = array($date, $mealType);
        
        $query = $this->db->query("CALL fn_getTodayPreparation(?, ?)", $data);
        
        return $query->result();
    }

    //----------------------------------------------
    // Food Modification
    //----------------------------------------------
    
    function findPlayer($term) {
        $data = array($term);
        
        $query = $this->db->query("CALL fn_findPlayer(?)", $data);
        
        return $query->result();
    }
    
    function getPlayerMealSet($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("CALL fn_getPlayerMealSet(?, ?)", $data);
        
        return $query->result();
    }
    
    function getPlayerWorklistMeal($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("CALL fn_getPlayerWorklistMeal(?, ?)", $data);
        
        return $query->result();
    }
    
    function addPlayerMealItem($playerCode, $yearMonth, $day, $orderCode, 
                               $foodCode, $foodWeight, $foodCalorie, $user) {
        $data = array($playerCode, $yearMonth, $day, $orderCode, 
                      $foodCode, $foodWeight, $foodCalorie, $user);
        
        $query = $this->db->query("CALL fn_addPlayerMealItem(?, ?, ?, ?, ?, ?, ?, ?)", $data);
        
        return $query->row();
    }
    
    function deletePlayerMealItem($worklistSeq, $orderCode, $mealSeq) {
        $data = array($worklistSeq, $orderCode, $mealSeq);
        
        $query = $this->db->query("CALL fn_deletePlayerMealItem(?, ?, ?)", $data);
        
        $query->row();
    }
    
    function editPlayerMealItem($worklistSeq, $orderCode, $mealSeq, 
                                $foodCode, $foodWeight, $foodCalorie) {
        $data = array($worklistSeq, $orderCode, $mealSeq, $foodCode, $foodWeight, $foodCalorie);
        
        $query = $this->db->query("CALL fn_editPlayerMealItem(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    //----------------------------------------------
    // Nutrition Plan
    //----------------------------------------------
    function getNutritionPlanMonth() {
        $query = $this->db->query("CALL fn_getNutritionPlanMonth()");
        
        $result = $query->result();
               
        $query->free_result();
        
        return $result;
    }
    
    function createNutritionPlan($yearMonth) {
        $data = array($yearMonth);
            
        $this->db->query("CALL fn_createNutritionPlan(?)", $data);
    }
    
    function getNutritionPlan($yearMonth) {
        $data = array($yearMonth);
            
        $query = $this->db->query("CALL fn_getNutritionPlan(?)", $data);
        
        $result = $query->result();
               
        $query->free_result();
        
        return $result;
    }
    
    function saveNutritionPlan($yearMonth, $playerCode, $mealSet, $weight, 
        $calorie, $milk, $meat, $fruit, $veggie, $rice, $lipid, $user) {
        $data = array($yearMonth, $playerCode, $mealSet, $weight, $calorie, $milk, $meat, $fruit, $veggie, $rice, $lipid, $user);
        
        $this->db->query("CALL fn_saveNutritionPlan(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", $data);
    }
    
    function saveAssessment($playerCode, $date, $bmi, $body, $weight,$diet, $grain, $protein, $fat, $milk, $fruit, $veg, $fluid, $user) {
        $data = array($playerCode, $date, $bmi, $body, $weight, $diet, $grain, $protein, $fat, $milk, $fruit, $veg, $fluid, $user);
         
        $query = $this->db->query("CALL fn_saveAssessment(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )", $data);
        
        $query->row();
    }
    
        function getPlayerAssessment($playerCode, $date) {
            
        $data = array($playerCode, $date);
         
        $query = $this->db->query("CALL fn_getPlayerAssessment(?, ?)", $data);
       
        $row = $query->row();
               
        $query->free_result();
        
        return $row;
    }
    
    function updateCommentAssessment($playerCode, $date, $category,$comment, $user){
        
        $data = array($playerCode, $date, $category,$comment, $user);
        
        $query = $this->db->query("CALL fn_updateCommentAssessment(?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    
}
