<?php

class AdminController extends BaseController{

    /**
     * 
     */
    public function index(){
        $data['title'] = 'Halaman Admin';
        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("admin/index");
        $this->view("templates/footer");
        
    }
}