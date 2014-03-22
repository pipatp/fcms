<?php

class worklist_item extends CI_Controller {
    function worklist_item() {
        parent::__construct();
        
        $this->load->library('permission');
        
        if (!$this->session->userdata('user_login')) {
            $this->output->set_status_header('401', 'No permission to perform operation');
            return;
        }
        
        if (!$this->session->userdata('user_permission')) {
            $this->output->set_status_header('401', 'No permission to perform operation');
            return;
        }
    }
    
    function registerWorklist() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('worklist_model');
        
        if (!$this->checkWritePermission($postData["department"])) {
            $this->output->set_status_header('401', 'No permission to perform operation');
            return;
        }
        
        if (!$this->worklist_model->registerWorklist($postData["worklistSeq"], $postData["itemSeq"], $postData["department"])) {
            $this->output->set_status_header('401', 'No permission to perform operation');
        }
    }
    
    private function checkWritePermission($department) {
        $perms = $this->session->userdata('user_permission');
        
        if (!array_key_exists($department, $perms)) {
            return false;
        }
        
        $perm = $perms[$department];
        if ($perm["write"] < 1) {
            return false;
        }
        
        return true;
    }
}

