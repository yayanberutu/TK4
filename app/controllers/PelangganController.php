<?php

class PelangganController extends BaseController{

    /**
     * 
     */
    public function index(){
        $allData = $this->model('PelangganModel')->getAll();
        $data['title'] = 'Halaman Pelanggan';
        $data['controllerName'] = 'pelanggan';
        $data['pelanggan'] = $allData['results'];
        $data['columns'] = $this->composeColumnsForModalAdd();
        $data['columnsEdit'] = $this->composeColumnsForModalEdit();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pelanggan", $data);
        $this->view("templates/modalAdd", $data);
        $this->view("templates/modalEdit", $data);
        $this->view("templates/footer");
        
    }

    public function composeColumnsForModalAdd(){
        // return list of (columnName, displayName, type)
        // ex: 'userName', 'User Name', 'text'
        //     'password', 'Password', 'password' 
        // define the columns to be displayed in the modal
        $columns = array(
            array('columnName' => 'namaPelanggan', 'displayName' => 'Nama Pelanggan', 'type' => 'text'),
            array('columnName' => 'noHp', 'displayName' => 'No. Hp', 'type' => 'text'),
            array('columnName' => 'alamat', 'displayName' => 'Alamat', 'type' => 'textarea')
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
            array('columnName' => 'NamaPelanggan', 'displayName' => 'Nama Pelanggan', 'type' => 'text'),
            array('columnName' => 'NoHp', 'displayName' => 'No Hp', 'type' => 'text'),
            array('columnName' => 'Alamat', 'displayName' => 'Alamat', 'type' => 'textarea')
        );

        // return the columns array
        return $columns;
    }

    public function getByIdJsonReturn(){
        $id = $_POST['id'];
        $data = $this->model('PelangganModel')->getById('IdPelanggan',$id);
        
        echo json_encode($data);
    }

    public function tambah(){
        // ambil userId dari session
        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
        }
		if( $this->model('PelangganModel')->savePelangganToDb($_POST, $userId) > 0 ) {
            Flasher::setMessage('Berhasil','ditambah','success');
			header('location: '. BASEURL . '/pelanggan');
			exit;			
		} else {
            Flasher::setMessage('Gagal','ditambah','danger');
			header('location: '. BASEURL . '/pelanggan');
			exit;	
		}
    }

    public function edit(){
        if( $this->model('PelangganModel')->update($_POST) > 0 ) {
			header('location: '. BASEURL . '/pelanggan');
			exit;			
		} else {
            // header('location: '. BASEURL . '/barang');
			// exit;		
        }
    }

    public function hapus($id){
        if( $this->model('PelangganModel')->delete('IdPelanggan',$id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. BASEURL . '/pelanggan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. BASEURL . '/pelanggan');
			exit;	
		}
    }
}