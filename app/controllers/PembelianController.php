<?php

class PembelianController extends BaseController{

    public function index(){
        $allData = $this->model('PembelianModel')->getAll();
        $data['title'] = 'Halaman Pembelian';
        $data['controllerName'] = 'pembelian';
        $data['pembelian'] = $allData['results'];
        $data['columns'] = $this->composeColumnsForModalAdd();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pembelian", $data);
        $this->view("/templates/modalAdd", $data);
        $this->view("templates/footer");
    }

    public function composeColumnsForModalAdd(){
        // return list of (columnName, displayName, type)
        // ex: 'userName', 'User Name', 'text'
        //     'password', 'Password', 'password' 
        // define the columns to be displayed in the modal
        $columns = array(
            array('columnName' => 'tanggalPembelian', 'displayName' => 'Tanggal Pembelian', 'type' => 'date'),
            array('columnName' => 'jumlahPembelian', 'displayName' => 'Jumlah Pembelian', 'type' => 'number'),
            array('columnName' => 'hargaBeli', 'displayName' => 'Harga Beli', 'type' => 'number'),
            array('columnName' => 'idBarang', 'displayName' => 'Id Barang', 'type' => 'text')
        );

        // return the columns array
        return $columns;
    }
}