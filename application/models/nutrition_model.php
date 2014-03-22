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
    
    function saveFoodMealItem($yearMonth, $day, $weekDay, $type, $itemCode, $user) {
        $data = array($yearMonth, $day, $weekDay, $type, $itemCode, $user);
        
        $query = $this->db->query("CALL fn_saveFoodMeal(?, ?, ?, ?, ?, ?)", $data);
        
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
}
