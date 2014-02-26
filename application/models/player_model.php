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
        
        return $query->row();
    }
}