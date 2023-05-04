<?php

class PenggunaController extends BaseController{

    public function index(){
        $data['title'] = 'Halaman Pengguna';
        $data['users'] = $this->model('PenggunaModel')->getAll();
        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pengguna", $data);
        $this->view("templates/footer");
        
    }

}