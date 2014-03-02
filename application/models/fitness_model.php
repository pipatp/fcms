<?php

class fitness_model extends CI_Model {
    function fitness_model() {
        parent::__construct();
        
        $this->load->database();
    }
        
    //----------------------------------------------
    // Fitness Modification
    //----------------------------------------------
    function getAllWorklist($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("CALL fn_getAllWorklist(?, ?)", $data);
        
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
}
