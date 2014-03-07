<?php

class coach_model extends CI_Model {
    function coach_model() {
        parent::__construct();
        
        $this->load->database();
    }
    
    function getCoachAppointmentInfo($user, $date) {
        $data = array($user, $date);
        
        $query = $this->db->query("CALL fn_getCoachAppointmentInfo(?, ?)", $data);
        
        $row = $query->row();
        
        $query->free_result();
        
        return $row;
    }
    
    function getCoachWorklistInfo($appointmentSeq) {
        $data = array($appointmentSeq);
        
        $query = $this->db->query("CALL fn_getCoachWorklistInfo(?)", $data);
        
        return $query->result();
    }
    
    function deleteCoachWorklistItem($appointmentSeq, $itemSeq) {
        $data = array($appointmentSeq, $itemSeq);
        
        $query = $this->db->query("CALL fn_deleteCoachWorklistItem(?, ?)", $data);
        
        $query->row();
    }
}