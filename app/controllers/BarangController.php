<?php

class BarangController extends BaseController{

    public function index(){
        $data['title'] = 'Halaman Barang';
        $data['barang'] = $this->model('BarangModel')->getAll();
        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/barang", $data);
        $this->view("templates/footer");
        
    }

}