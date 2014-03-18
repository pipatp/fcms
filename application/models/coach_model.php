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
    
    function addCoachWorklistItem($date, $startTime, $endTime, $detail, $user) {
        $data = array($date, $startTime, $endTime, $detail, $user);
        
        $query = $this->db->query("CALL fn_addCoachWorklistItem(?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    function deleteCoachWorklistItem($appointmentSeq, $itemSeq) {
        $data = array($appointmentSeq, $itemSeq);
        
        $query = $this->db->query("CALL fn_deleteCoachWorklistItem(?, ?)", $data);
        
        $query->row();
    }
    
    function updateCoachScheduleDetail($user, $date, $detail) {
        $data = array($user, $date, $detail);
        
        $query = $this->db->query("CALL fn_updateCoachScheduleDetail(?, ?, ?)", $data);
        
        $query->row();
    }
    
    function getCoachScheduleDates($year, $month) {
        $yearMonth = $year . $month . "%";
        
        $data = array($yearMonth);
        
        $query = $this->db->query("CALL fn_getCoachAppointmentDates(?)", $data);
        
        return $query->result();
    }
    
    //----------------------------------------------
    // Coach Fitness
    //----------------------------------------------
    function getCoachViewSchedule($date, $category) {
        $data = array($date, $category);
        
        $query = $this->db->query("CALL fn_getCoachViewSchedule(?, ?)", $data);
        
        return $query->result();
    }
}