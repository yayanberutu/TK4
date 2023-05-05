<?php

class BarangController extends BaseController{

    public function index(){
        $allData = $this->model('BarangModel')->getAll();
        $data['title'] = 'Halaman Barang';
        $data['controllerName'] = 'barang';
        $data['barang'] = $allData['results'];
        $data['columns'] = $this->composeColumnsForModalAdd();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/barang", $data);
        $this->view("templates/modalAdd", $data);
        $this->view("templates/footer");
        
    }

    public function tambah(){
        // ambil userId dari session
        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
        }
		if( $this->model('BarangModel')->saveBarangToDb($_POST, $userId) > 0 ) {
			header('location: '. BASEURL . '/barang');
			exit;			
		} else {
			header('location: '. BASEURL . '/barang');
			exit;	
		}
    }

    public function composeColumnsForModalAdd(){
        // return list of (columnName, displayName, type)
        // ex: 'userName', 'User Name', 'text'
        //     'password', 'Password', 'password' 
        // define the columns to be displayed in the modal
        $columns = array(
            array('columnName' => 'namaBarang', 'displayName' => 'Nama Barang', 'type' => 'text'),
            array('columnName' => 'keterangan', 'displayName' => 'Keterangan', 'type' => 'textarea'),
            array('columnName' => 'satuan', 'displayName' => 'Satuan', 'type' => 'text')
        );

        // return the columns array
        return $columns;
    }

    /**
     * This method is to get request from view while editing data on modal
     *  and return json
     */
    public function getByIdJsonReturn(){
        $id_barang = $_POST['id_barang'];
        $data = $this->model('BarangModel')->getById($id_barang);
        
        echo json_encode($data);
    }

    public function edit(){
        if( $this->model('BarangModel')->update($_POST) > 0 ) {
			header('location: '. BASEURL . '/barang');
			exit;			
		}
    }

}