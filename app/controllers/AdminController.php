<?php

class AdminController extends BaseController{

    /**
     * 
     */
    public function index(){
        $data['title'] = 'Halaman Admin';
        $data['role'] = $_SESSION['role'];
        $data['controllerName'] = 'admin';
        
        $allDataKeuntungan = $this->model('AdminModel')->getAllDataKeuntunganEachBarangView();
        $data['labels'] = array_column($allDataKeuntungan, 'NamaBarang');
        $data['values'] = array_column($allDataKeuntungan, 'Keuntungan');
        
        
        $stocks = $this->model('AdminModel')->getStockEachBarangView();
        $data['stocks'] = array_column($stocks, 'Stock');

        $barangTerjual = $this->model('AdminModel')->getTotalBarangTerjual();
        $data['jumlahTerjual'] = array_column($barangTerjual, 'JumlahTerjual');

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("admin/index", $data);
        $this->view("templates/footer");
        
    }

    public function getDataKeuntungan(){
        $result = $this->model('AdminModel')->getAllDataKeuntunganPenjualanView();
        echo json_encode($result);
    }

}