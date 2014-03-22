<?php

class worklist_model extends CI_Model {
    function worklist_model() {
        parent::__construct();
        
        $this->load->database();
    }
    
    function getRegistrationList($date, $category, $worklistStatus) {
        $data = array($date, $category, $worklistStatus);
        
        $query = $this->db->query("CALL fn_getWorklistRegistration(?, ?, ?)", $data);
        
        return $query->result();
    }
    
    function registerWorklist($worklistSeq, $itemSeq, $department) {
        $data = array($worklistSeq, $itemSeq, $department);
        
        $this->db->query("CALL fn_registerWorklist(?, ?, ?)", $data);
        
        return $this->db->affected_rows() > 0;
    }
    
    function getPlayerWorklistSeq($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("SELECT PwlSeqNum FROM pwlinf WHERE PwlPlyCod=? AND PwlAppDte=?", $data);
        
        $row = $query->row();
        if ($row) {
            return $row->PwlSeqNum;
        }
        
        return -1;
    }
    
    function getWorklistByCategory($playerCode, $date, $category) {
        $data = array($playerCode, $date, $category);
        
        $query = $this->db->query("CALL fn_getWorklistByCategory(?, ?, ?)", $data);
        
        return $query->result();
    }
    
    function deleteWorklistItem($worklistSeq, $seqNum, $itemCode) {
        $data = array($worklistSeq, $seqNum, $itemCode);
        
        $query = $this->db->query("CALL fn_deleteWorklistItem(?, ?, ?)", $data);
        
        $query->row();
    }
    
    function getAllWorklist($playerCode, $date) {
        $data = array($playerCode, $date);
        
        $query = $this->db->query("CALL fn_getAllWorklist(?, ?)", $data);
        
        return $query->result();
    }
    
    function addWorklistItem($worklistSeq, $orderCode, $startTime, $endTime, $duration, $user) {
        $data = array($worklistSeq, $orderCode, $startTime, $endTime, $duration, $user);
        
        $query = $this->db->query("CALL fn_addPlayerWorklist(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    function addWorklistItemWithAutoAddPlayerWorklist($playerCode, $date, $orderCode, $startTime, $endTime, $duration, $user) {
        $data = array($playerCode, $date, $orderCode, $startTime, $endTime, $duration, $user);
        
        $query = $this->db->query("CALL fn_addPlayerWorklistWithAutoAddPlayerWorklist(?, ?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    function getPlayerScheduleDates($playerCode, $year, $month) {
        $yearMonth = $year . $month . "%";
        
        $data = array($playerCode, $yearMonth);
        
        $query = $this->db->query("CALL fn_getPlayerScheduleDates(?, ?)", $data);
        
        return $query->result();
    }
}