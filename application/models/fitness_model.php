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
}
