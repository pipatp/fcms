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
        
//        $image = $this->player_model->getImage($playerCode);
        $image = file_get_contents("L:\\AppServ\\www\\fcms\\images\\ChainatFC-logo2013.png");
        
        header("Content-Type: image/jpg");
        echo $image;
    }
}
