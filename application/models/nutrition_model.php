<?php

class nutrition_model extends CI_Model {
    function nutrition_model() {
        parent::__construct();
        
        $this->load->database();
    }

    //----------------------------------------------
    // Food Registration
    //----------------------------------------------    
    function getRegistrationWaitingList($meal) {
        $data = array($meal);
         
        $query = $this->db->query("CALL fn_getRegistrationWaitingList(?)", $data);
        
        return $query->result();
    }
    
    function getRegistrationReceiveList($meal) {
        $data = array($meal);
         
        $query = $this->db->query("CALL fn_getRegistrationReceiveList(?)", $data);
        
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
    
    function saveFoodMealItem($yearMonth, $day, $weekDay, $type, $itemCode, $itemWeight, $itemCalorie) {
        $data = array($yearMonth, $day, $weekDay, $type, $itemCode, $itemWeight, $itemCalorie);
        
        $query = $this->db->query("CALL fn_saveFoodMeal(?, ?, ?, ?, ?, ?, ?)", $data);
        
        return $query->row();
    }
    
    function deleteFoodMealItem($yearMonth, $day, $weekDay, $type, $itemCode) {
        $data = array($yearMonth, $day, $weekDay, $type, $itemCode);
        
        $query = $this->db->query("CALL fn_deleteFoodMeal(?, ?, ?, ?, ?)", $data);
        
        $query->row();
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
    
    function getMealTypes() {
        $query = $this->db->query("CALL fn_getMealType()");
        
        return $query->result();
    }
    
    function getPlayerMealSet($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("CALL fn_getPlayerMealSet(?, ?)", $data);
        
        return $query->result();
    }
}
