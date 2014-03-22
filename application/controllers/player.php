<?php

class player extends CI_Controller {
    function player() {
        parent::__construct();
    }
    
    protected function getQueryStringParams() {
        parse_str($_SERVER['QUERY_STRING'], $params);
        return $params;
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
    
    function thumbnail($playerCode) {
        $this->load->model('player_model');
        
        $queryParams = $this->getQueryStringParams();
        
        $width = 50;
        $height = 50;

        if ($queryParams) {
            if (array_key_exists('width', $queryParams)) {
                $width = $queryParams['width'];
            }
            
            if (array_key_exists('height', $queryParams)) {
                $height = $queryParams['width'];
            }
        }
        
        $image = $this->player_model->getImage($playerCode);
        
        $faceImagePath = getcwd() . "\\images\\no_image.png";
        
        if ($image != null) {
            if ($image->PimFac != null) {
                $faceImagePath = $image->PimFac;
            }
        }
       
        $config['image_library'] = 'gd2';
        $config['source_image'] = $faceImagePath;
        $config['dynamic_output'] = true;
        $config['width'] = $width;
        $config['height'] = $height;
        
        $this->load->library('image_lib', $config);
        
        header("Content-Type: image/jpg");
        echo $this->image_lib->resize()->save_dynamic();;
    }
       
    function search() {
        $queryParams = $this->getQueryStringParams();
        
        $term = $queryParams['term'];
        
        $this->load->model('player_model');
        
        $data["content"] = $this->player_model->searchPlayer($term);
        
        $this->load->view('json_result', $data);        
    }
       
    function comment($playerCode) {
        $queryParams = $this->getQueryStringParams();
        
        $category = $queryParams['cat'];

        $this->load->model('player_model');

        $data["content"] = $this->player_model->getComment($playerCode, $category);

        $this->load->view('json_result', $data);
    }
    
    function updateComment() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('player_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->player_model->addComment($postData["playerCode"],
                    $postData["category"], $postData["comment"], $user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Add failed.');
        }
    }
    
    function updateResult() {
        $postData = json_decode(trim(file_get_contents('php://input')), true);
        
        $this->load->model('player_model');
        
        $loginSession = $this->session->userdata('user_login');
        $user = $loginSession["username"];
        
        try {
            $this->player_model->updateResult($postData["playerCode"],
                    $postData["date"], $postData["comment"], 
                    $postData["category"], $postData["subcategory"],
                    user);
        } catch (Exception $e) {
            $this->output->set_status_header('500', 'Delete item failed.');
        }
    }
}
