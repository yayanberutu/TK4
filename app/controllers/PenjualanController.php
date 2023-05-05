<?php

class PenjualanController extends BaseController{

    public function index(){
        $allData = $this->model('PenjualanModel')->getAll();
        $data['title'] = 'Halaman Penjualan';
        $data['controllerName'] = 'penjualan';
        $data['penjualan'] = $allData['results'];
        $data['columns'] = $this->composeColumnsForModalAdd();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/penjualan", $data);
        $this->view("templates/modalAdd", $data);
        $this->view("templates/footer");
        
    }

    public function composeColumnsForModalAdd(){
        // return list of (columnName, displayName, type)
        // ex: 'userName', 'User Name', 'text'
        //     'password', 'Password', 'password' 
        // define the columns to be displayed in the modal
        $columns = array(
            array('columnName' => 'tanggalPenjualan', 'displayName' => 'Tanggal Penjualan', 'type' => 'date'),
            array('columnName' => 'jumlahPenjualan', 'displayName' => 'Jumlah Penjualan', 'type' => 'number'),
            array('columnName' => 'hargaJual', 'displayName' => 'Harga Jual', 'type' => 'number'),
            array('columnName' => 'idBarang', 'displayName' => 'Id Barang', 'type' => 'text')
        );

        // return the columns array
        return $columns;
    }
}