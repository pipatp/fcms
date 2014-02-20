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
}
