<?php

class PenjualanController extends BaseController{

    public function index(){
        $allData = $this->model('PenjualanModel')->getAllDataForMainView();
        $data['title'] = 'Halaman Penjualan';
        $data['controllerName'] = 'penjualan';
        $data['penjualan'] = $allData;
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
            array('columnName' => 'idBarang', 'displayName' => 'Id Barang', 'type' => 'text'),
            array('columnName' => 'idPelanggan', 'displayName' => 'Id Pelanggan', 'type' => 'text')
        );

        // return the columns array
        return $columns;
    }

    public function hapus($id){
        if( $this->model('PenjualanModel')->delete('IdPenjualan',$id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. BASEURL . '/penjualan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. BASEURL . '/penjualan');
			exit;	
		}
    }

    public function tambah(){
        // ambil userId dari session
        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
        }
		if( $this->model('PenjualanModel')->savePenjualanToDb($_POST, $userId) > 0 ) {
            Flasher::setMessage('Berhasil','ditambah','success');
			header('location: '. BASEURL . '/penjualan');
			exit;			
		} else {
            Flasher::setMessage('Gagal','ditambah','danger');
			header('location: '. BASEURL . '/penjualan');
			exit;	
		}
    }
}