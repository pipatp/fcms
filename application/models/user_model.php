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
    
    function getPermission($username) {
        $data = array($username);
        
        $query = $this->db->query("CALL fn_getPermissions(?)", $data);
        
        $result = $query->result();
        
        $query->free_result();
        
        return $result;
    }
}
