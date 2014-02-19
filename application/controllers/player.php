<?php

class player extends CI_Controller {
    function player() {
        parent::__construct();
        
//        if (!$this->session->userdata('user_login')) {
//            redirect('main/login');
//        }
    }
    
    function image($playerCode) {
        $this->load->model('player_model');
        
        $image = $this->player_model->getImage($playerCode);
        
        $faceImagePath = getcwd() . "\\images\\no_image.png";
        
        if ($image != null) {
            if ($image->PimFac != null) {
                $faceImagePath = $image->PimFac;
            }
        }
       
        $imageContent = file_get_contents($faceImagePath);
        
        header("Content-Type: image/jpg");
        echo $imageContent;
    }
}
