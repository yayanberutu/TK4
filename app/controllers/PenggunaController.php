<?php

class PenggunaController extends BaseController{

    public function index(){
        $allData = $this->model('PenggunaModel')->getAll();
        $data['title'] = 'Halaman Pengguna';
        $data['pengguna'] = $allData['results'];
        $data['columns'] = $allData['columns'];
        
        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pengguna", $data);
        $this->view("templates/footer");
        
    }

}