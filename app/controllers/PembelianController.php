<?php

class PembelianController extends BaseController{

    public function index(){
        $allData = $this->model('PembelianModel')->getAllDataForMainView();
        $data['title'] = 'Halaman Pembelian';
        $data['controllerName'] = 'pembelian';
        $data['pembelian'] = $allData;
        $data['columns'] = $this->composeColumnsForModalAdd();
        $data['columnsEdit'] = $this->composeColumnsForModalEdit();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pembelian", $data);
        $this->view("/templates/modalAdd", $data);
        $this->view("/templates/modalEdit", $data);
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

    public function composeColumnsForModalEdit(){
        // return list of (columnName, displayName, type)
        // ex: 'userName', 'User Name', 'text'
        //     'password', 'Password', 'password' 
        // define the columns to be displayed in the modal
        $columns = array(
            array('columnName' => 'TanggalPembelian', 'displayName' => 'Tanggal Pembelian', 'type' => 'date'),
            array('columnName' => 'JumlahPembelian', 'displayName' => 'Jumlah Pembelian', 'type' => 'number'),
            array('columnName' => 'HargaBeli', 'displayName' => 'Harga Beli', 'type' => 'number'),
            array('columnName' => 'IdBarang', 'displayName' => 'Id Barang', 'type' => 'text'),
            array('columnName' => 'IdSupplier', 'displayName' => 'Id Supplier', 'type' => 'text')
        );

        // return the columns array
        return $columns;
    }

    public function getByIdJsonReturn(){
        $id = $_POST['id'];
        $data = $this->model('PembelianModel')->getById('IdPembelian',$id);
        
        echo json_encode($data);
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

    public function edit(){
        if( $this->model('PembelianModel')->update($_POST) > 0 ) {
            Flasher::setMessage('Berhasil','diubah','success');
			header('location: '. BASEURL . '/pembelian');
			exit;			
		} else {
            Flasher::setMessage('Gagal','diubah','danger');
            header('location: '. BASEURL . '/pembelian');
			exit;		
        }
    }
}