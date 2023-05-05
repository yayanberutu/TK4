<?php

class PenggunaController extends BaseController{

    public function index(){
        $allData = $this->model('PenggunaModel')->getAll();
        $data['title'] = 'Halaman Pengguna';
        $data['controllerName'] = 'pengguna';
        $data['pengguna'] = $allData['results'];
        $data['columns'] = $this->composeColumnsForModalAdd();
        $data['columnsEdit'] = $this->composeColumnsForModalEdit();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/pengguna", $data);
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
            array('columnName' => 'namaDepan', 'displayName' => 'Nama Depan', 'type' => 'text'),
            array('columnName' => 'namaBelakang', 'displayName' => 'Nama Belakang', 'type' => 'text'),
            array('columnName' => 'username', 'displayName' => 'Username', 'type' => 'text'),
            array('columnName' => 'password', 'displayName' => 'Password', 'type' => 'password'),
            array('columnName' => 'noHp', 'displayName' => 'No. Hp', 'type' => 'text'),
            array('columnName' => 'alamat', 'displayName' => 'Alamat', 'type' => 'textarea'),
            array('columnName' => 'idAkses', 'displayName' => 'Id Akses', 'type' => 'text')
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
            array('columnName' => 'NamaDepan', 'displayName' => 'Nama Depan', 'type' => 'text'),
            array('columnName' => 'NamaBelakang', 'displayName' => 'Nama Belakang', 'type' => 'text'),
            array('columnName' => 'NamaPengguna', 'displayName' => 'Username', 'type' => 'text'),
            array('columnName' => 'NoHp', 'displayName' => 'No Hp', 'type' => 'text'),
            array('columnName' => 'Alamat', 'displayName' => 'Alamat', 'type' => 'textarea')
        );

        // return the columns array
        return $columns;
    }

    public function tambah(){
        // ambil userId dari session
        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
        }
		if( $this->model('PenggunaModel')->savePenggunaToDb($_POST, $userId) > 0 ) {
			header('location: '. BASEURL . '/pengguna');
			exit;			
		} else {
			header('location: '. BASEURL . '/pengguna');
			exit;	
		}
    }

    /**
     * This method is to get request from view while editing data on modal
     *  and return json
     */
    public function getByIdJsonReturn(){
        $id = $_POST['id'];
        $data = $this->model('PenggunaModel')->getById('IdPengguna',$id);
        
        echo json_encode($data);
    }

    public function edit(){
        if( $this->model('PenggunaModel')->update($_POST) > 0 ) {
			header('location: '. BASEURL . '/pengguna');
			exit;			
		} else {
            // header('location: '. BASEURL . '/barang');
			// exit;		
        }
    }
}