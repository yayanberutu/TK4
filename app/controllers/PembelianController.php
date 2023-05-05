<?php

class PembelianController extends BaseController{

    public function index(){
        $allData = $this->model('PembelianModel')->getAll();
        $data['title'] = 'Halaman Pembelian';
        $data['pembelian'] = $allData['results'];
        $data['columns'] = $allData['columns'];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pembelian", $data);
        $this->view("templates/footer");
    }

}