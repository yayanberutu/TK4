<?php

class PenjualanController extends BaseController{

    public function index(){
        $data['title'] = 'Halaman Penjualan';
        $data['penjualan'] = $this->model('PenjualanModel')->getAll();
        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/penjualan", $data);
        $this->view("templates/footer");
        
    }

}