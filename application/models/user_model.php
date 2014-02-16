<?php

class user_model extends CI_Model {
    function user_model() {
        parent::__construct();        
        $this->load->database();
    }
    
    function authenticate($username, $password) {
        $this->db->where('UsrCod', $username);
        $this->db->where('UsrLogPwd', $password);
        $this->db->from('usrmst');
        
        $rowCount = $this->db->count_all_results();
        return $rowCount > 0;
    }
}
