<?php

class player_model extends CI_Model {
    function player_model() {
        parent::__construct();        
        $this->load->database();
    }
    
    function getImage($playerCode) {
        $this->db->where('PimPlyCod', $playerCode);
        $this->db->from('piminf');
        
        $query = $this->db->get();
        
        return $query->row();
    }
    
    function searchPlayer($term) {
        $data = array($term);
        
        $query = $this->db->query("CALL fn_findPlayer(?)", $data);
        
        return $query->result();
    }
    
    function getComment($playerCode, $category) {
        $data = array($playerCode, $category);
        
        $query = $this->db->query("CALL fn_getPlayerComment(?, ?)", $data);
        
        $row = $query->row();
               
        $query->free_result();
        
        return $row;
    }
    
    function addComment($playerCode, $category, $comment, $user) {
        $data = array($playerCode, $category, $comment, $user);
        
        $query = $this->db->query("CALL fn_addPlayerComment(?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    function getResult($playerCode, $date, $category, $subcategory) {
        $data = array($playerCode, $date, $category, $subcategory);
        
        $query = $this->db->query("CALL fn_getPlayerResult(?, ?, ?, ?)", $data);
        
        $row = $query->row();
               
        $query->free_result();
        
        return $row;
    }
    
    function getHistoryResult($playerCode, $category, $subcategory) {
        $data = array($playerCode, $category, $subcategory);
        
        $query = $this->db->query("CALL fn_getPlayerHistoryResult(?, ?, ?)", $data);
        
        $result = $query->result();
               
        $query->free_result();
        
        return $result;
    }
    
    function updateResult($playerCode, $date, $comment, $category, $subcategory, $user) {
        $data = array($playerCode, $date, $comment, $category, $subcategory, $user);
        
        $query = $this->db->query("CALL fn_addPlayerResult(?, ?, ?, ?, ?, ?)", $data);
        
        $query->row();
    }
    
    function getInfo($playerCode) {
        $data = array($playerCode);
        
        $query = $this->db->query("CALL fn_getPlayerInfo(?)", $data);
        
        $row = $query->row();
               
        $query->free_result();
        
        return $row;
    }
    
    function getAllPlayers() {
        $query = $this->db->query("SELECT * FROM plyinf ORDER BY PlyFstNam");
        
        $result = $query->result();
               
        $query->free_result();
        
        return $result;
    }
}