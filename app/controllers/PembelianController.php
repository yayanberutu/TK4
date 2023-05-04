<?php

class PembelianController extends BaseController{

    public function index(){
        $data['title'] = 'Halaman Pembelian';
        $data['pembelian'] = $this->model('PembelianModel')->getAll();
        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pembelian", $data);
        $this->view("templates/footer");
        
    }

}