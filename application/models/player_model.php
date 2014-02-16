<?php

class player_model extends CI_Model {
    function player_model() {
        parent::__construct();        
        $this->load->database();
    }
    
    function getImage($playerCode) {
        $this->db->where('PimPlyCod', $playerCode);
        $this->db->from('piminf');
        
        return $this->db->row();
    }
}