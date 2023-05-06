<?php

class PembelianController extends BaseController{

    public function index(){
        $allData = $this->model('PembelianModel')->getAllDataForMainView();
        $data['title'] = 'Halaman Pembelian';
        $data['controllerName'] = 'pembelian';
        $data['pembelian'] = $allData;
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
            array('columnName' => 'idBarang', 'displayName' => 'Id Barang', 'type' => 'text'),
            array('columnName' => 'idSupplier', 'displayName' => 'Id Supplier', 'type' => 'text')
        );

        // return the columns array
        return $columns;
    }

    public function hapus($id){
        if( $this->model('PembelianModel')->delete('IdPembelian',$id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. BASEURL . '/pembelian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. BASEURL . '/pembelian');
			exit;	
		}
    }

    public function tambah(){
        // ambil userId dari session
        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
        }
		if( $this->model('PembelianModel')->savePembelianToDb($_POST, $userId) > 0 ) {
            Flasher::setMessage('Berhasil','ditambah','success');
			header('location: '. BASEURL . '/pembelian');
			exit;			
		} else {
            Flasher::setMessage('Gagal','ditambah','danger');
			header('location: '. BASEURL . '/pembelian');
			exit;	
		}
    }
}