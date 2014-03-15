<?php

class inventory_model extends CI_Model {
    function inventory_model() {
        parent::__construct();
        
        $this->load->database();
    }
    
    function getAllInventoryItems() {
        $query = $this->db->query("CALL fn_getAllInventoryItems()");
        
        return $query->result();
    }
    
    function addStoreInItem($transactionId, $code, $amount, $price, $expire, $expireDate, $category, $user) {
        $data = array($transactionId, $code, $amount, $price, $expire, $expireDate, $category, $user);
        
        $this->db->query("CALL fn_addStoreInItem(?, ?, ?, ?, ?, ?, ?, ?)", $data);
    }
    
    function addStoreInTransaction($date, $category, $type, $department, $remark, $user, $items) {
        $data = array($date, $category, $type, $department, $remark, $user);
        
        $this->db->trans_begin();
                
        $query = $this->db->query("CALL fn_addStoreInTransaction(?, ?, ?, ?, ?, ?)", $data);
        
        $row = $query->row();
        
        $query->free_result();
        
        foreach ($items as $item) {
            $this->addStoreInItem($row->InvSitSeq, $item["code"], $item["amount"], $item["price"], $item["expire"],
                    $item["expireDate"], $item["category"], $user);
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            
            throw new Exception('Division by zero.');
        }
        else
        {
            $this->db->trans_commit();
        }
    }
}