<?php

class BarangController extends BaseController{

    public function index(){
        $allData = $this->model('BarangModel')->getAll();
        $data['title'] = 'Halaman Barang';
        $data['barang'] = $allData['results'];
        $data['columns'] = $allData['columns'];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/barang", $data);
        $this->view("templates/footer");
        
    }

}