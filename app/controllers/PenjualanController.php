<?php

class PenjualanController extends BaseController{

    public function index(){
        $allData = $this->model('PenjualanModel')->getAll();
        $data['title'] = 'Halaman Penjualan';
        $data['penjualan'] = $allData['results'];
        $data['columns'] = $allData['columns'];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/penjualan", $data);
        $this->view("templates/footer");
        
    }

}