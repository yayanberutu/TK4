<?php

class AdminController extends BaseController{

    /**
     * 
     */
    public function index(){
        $data['title'] = 'Halaman Admin';
        $data['role'] = $_SESSION['role'];
        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("admin/index");
        $this->view("templates/footer");
        
    }
}