<?php

class fitness_model extends CI_Model {
    function fitness_model() {
        parent::__construct();
        
        $this->load->database();
    }
    
    //----------------------------------------------
    // Fitness Registration
    //----------------------------------------------
    function getFitnessRegistrationList($date, $worklistStatus) {
        $data = array($date, $worklistStatus);
        
        $query = $this->db->query("CALL fn_getFitnessRegistrationList(?, ?)", $data);
        
        return $query->result();
    }
    
    //----------------------------------------------
    // Fitness Modification
    //----------------------------------------------
    function getFitnessWorklist($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("CALL fn_getFitnessWorklist(?, ?)", $data);
        
        return $query->result();
    }
    
    function deleteFitnessWorklist($worklistSeq, $seqNum, $itemCode) {
        $data = array($worklistSeq, $seqNum, $itemCode);
        
        $query = $this->db->query("CALL fn_deleteWorklistItem(?, ?, ?)", $data);
        
        $query->row();
    }
    
    function getAllWorklist($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("CALL fn_getAllWorklist(?, ?)", $data);
        
        return $query->result();
    }
    
    function searchFitnessOrder($term) {
        $data = array($term, 'FIT');
        
        $query = $this->db->query("CALL fn_findOrder(?, ?)", $data);
        
        return $query->result();
    }
    
    function hasWorklist($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("SELECT PwlSeqNum FROM pwlinf WHERE PwlPlyCod=? AND PwlAppDte=?", $data);
        
        $row = $query->row();
        if ($row) {
            return $row->PwlSeqNum;
        }
        
        return -1;
    }
    
    function addFitnessWorklist($worklistSeq, $orderCode, $startTime, $endTime, $duration, $user) {
        $data = array($worklistSeq, $orderCode, $startTime, $endTime, $duration, $user);
        
        $query = $this->db->query("CALL fn_addPlayerWorklist(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    //----------------------------------------------
    // Fitness Record Result
    //----------------------------------------------
    function getFitnessResult($playerCode, $date, $category, $subcategory) {
        $data = array($playerCode, $date, $category, $subcategory);
        
        $query = $this->db->query("CALL fn_getPlayerResult(?, ?, ?, ?)", $data);
        
        $row = $query->row();
               
        $query->free_result();
        
        return $row;
    }
    
    function addFitnessResult($playerCode, $date, $comment, $category, $subcategory, $user) {
        $data = array($playerCode, $date, $comment, $category, $subcategory, $user);
        
        $query = $this->db->query("CALL fn_addPlayerResult(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
}
