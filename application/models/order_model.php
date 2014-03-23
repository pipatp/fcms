<?php

class order_model extends CI_Model {
    function order_model() {
        parent::__construct();
        
        $this->load->database();
    }
    
    function searchOrder($term, $category) {
        $data = array($term, $category);
        
        $query = $this->db->query("CALL fn_findOrder(?, ?)", $data);
        
        return $query->result();
    }
    
    function getAllOrders() {
        $query = $this->db->query("CALL fn_getAllOrders()");
        
        return $query->result();
    }
}