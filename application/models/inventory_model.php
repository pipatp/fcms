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
            
            throw new Exception('Failed to add store in transaction');
        }
        else
        {
            $this->db->trans_commit();
        }
    }
    
    function addDeliverItem($transactionId, $code, $amount, $category, $user) {
        $data = array($transactionId, $code, $amount, $category, $user);
        
        $this->db->query("CALL fn_addDeliverItem(?, ?, ?, ?, ?)", $data);
    }
    
    function addDeliverTransaction($date, $category, $type, $department, $remark, $user, $items) {
        $data = array($date, $category, $type, $department, $remark, $user);
        
        $this->db->trans_begin();
                
        $query = $this->db->query("CALL fn_addDeliverTransaction(?, ?, ?, ?, ?, ?)", $data);
        
        $row = $query->row();
        
        $query->free_result();
        
        foreach ($items as $item) {
            $this->addDeliverItem($row->InvDltSeq, $item["code"], $item["amount"], $item["category"], $user);
            
            if (!$this->decrementDeliverItem($item["code"], $item["amount"], $item["category"])) {
                $this->db->trans_rollback();
                return false;
            }
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            
            throw new Exception('Failed to add deliver transaction');
        }
        else
        {
            $this->db->trans_commit();
        }
        
        return true;
    }
    
    function decrementDeliverItem($code, $amount, $category) {
        $total = $this->getTotalItemRemain($code, $category);
        if ($total < $amount) {
            return false;
        }
        
        $items = $this->getRemainItemList($code, $category);
        
        $remainUsed = $amount;
        
        foreach ($items as $item) {
            $curRemain = $item->InvOdrRem;
            
            $newRemain = $curRemain - $remainUsed;
            if ($newRemain < 0) {
                $remainUsed = -$newRemain;
                $newRemain = 0;
            }
            else {
                $remainUsed = 0;
            }
            
            if (!$this->decrementItem($item->InvSdtSeq, $curRemain, $newRemain)) {
                return false;
            }
            
            if ($remainUsed == 0) {
                return true;
            }
        }
        
        return false;
    }
    
    function getTotalItemRemain($code, $category) {
        $data = array($code, $category);
        
        $query = $this->db->query("CALL fn_getTotalInventoryItem(?, ?)", $data);
        
        $row = $query->row();
        
        $query->free_result();
        
        return (!$row) ? 0 : $row->InvTtlRem;
    }
    
    function getRemainItemList($code, $category) {
        $data = array($code, $category);
        
        $query = $this->db->query("CALL fn_getRemainInventoryItemList(?, ?)", $data);
        
        $result = $query->result();
        
        $query->free_result();
        
        return $result;
    }
    
    function decrementItem($itemSeq, $oldAmount, $newAmount) {
        $data = array($itemSeq, $oldAmount, $newAmount);
        
        $this->db->query("CALL fn_decrementInventoryItem(?, ?, ?)", $data);
        
        return $this->db->affected_rows() == 1 ;
    }
    
    function getInvetoryStock($category) {
        $data = array($category);
        
        $query = $this->db->query("CALL fn_getInvetoryStock(?)", $data);
        
        return $query->result();
    }
    
    function getExpireInventoryItems($category) {
        $data = array($category);
        
        $query = $this->db->query("CALL fn_getExpireInventoryItems(?)", $data);
        
        return $query->result();
    }
    
    function deliverExpireInventoryItem($date, $category, $type, $department, $remark, $user, $itemSeq, $itemAmount) {
        $data = array($date, $category, $type, $department, $remark, $user);
        
        $this->db->trans_begin();
                
        $query = $this->db->query("CALL fn_addDeliverTransaction(?, ?, ?, ?, ?, ?)", $data);
        
        $row = $query->row();
        
        $query->free_result();
        
        if (!$this->expireInventoryItem($itemSeq, $itemAmount, $row->InvDltSeq, $category, $user)) {
            $this->db->trans_rollback();
            return false;
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            
            throw new Exception('Failed to add deliver transaction');
        }
        else
        {
            $this->db->trans_commit();
        }
        
        return true;
    }
    
    private function expireInventoryItem($itemSeq, $itemAmount, $deliverSeq, $category, $user) {
        $data = array($itemSeq, $itemAmount, $deliverSeq, $category, $user);

        $query = $this->db->query("CALL fn_expireInventoryItem(?, ?, ?, ?, ?)", $data);
        $row = $query->row();
        
        $query->free_result();
        
        return $row->result == 1;
    }
}