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
}