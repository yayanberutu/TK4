<?php

class SupplierController extends BaseController {
/**
     * 
     */
    public function index(){
        $allData = $this->model('SupplierModel')->getAll();
        $data['title'] = 'Halaman Supplier';
        $data['controllerName'] = 'supplier';
        $data['supplier'] = $allData['results'];
        $data['columns'] = $this->composeColumnsForModalAdd();
        $data['columnsEdit'] = $this->composeColumnsForModalEdit();

        $this->view("templates/header", $data);
        $this->view("templates/sidebar", $data);
        $this->view("/admin/supplier", $data);
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
            array('columnName' => 'namaSupplier', 'displayName' => 'Nama Supplier', 'type' => 'text'),
            array('columnName' => 'noHp', 'displayName' => 'No. Hp', 'type' => 'text'),
            array('columnName' => 'alamat', 'displayName' => 'Alamat', 'type' => 'textarea'),
            array('columnName' => 'provinsi', 'displayName' => 'Provinsi', 'type' => 'text')
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
            array('columnName' => 'NamaSupplier', 'displayName' => 'Nama Supplier', 'type' => 'text'),
            array('columnName' => 'NoHp', 'displayName' => 'No Hp', 'type' => 'text'),
            array('columnName' => 'Alamat', 'displayName' => 'Alamat', 'type' => 'textarea'),
            array('columnName' => 'Kota', 'displayName' => 'Kota', 'type' => 'text'),
            array('columnName' => 'Provinsi', 'displayName' => 'Provinsi', 'type' => 'text')
        );

        // return the columns array
        return $columns;
    }

    public function getByIdJsonReturn(){
        $id = $_POST['id'];
        $data = $this->model('SupplierModel')->getById('IdSupplier',$id);
        
        echo json_encode($data);
    }

    public function tambah(){
        // ambil userId dari session
        if(isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
        }
		if( $this->model('SupplierModel')->saveSupplierToDb($_POST, $userId) > 0 ) {
            Flasher::setMessage('Berhasil','ditambah','success');
			header('location: '. BASEURL . '/supplier');
			exit;			
		} else {
            Flasher::setMessage('Gagal','ditambah','danger');
			header('location: '. BASEURL . '/supplier');
			exit;	
		}
    }

    public function edit(){
        if( $this->model('SupplierModel')->update($_POST) > 0 ) {
			header('location: '. BASEURL . '/supplier');
			exit;			
		} else {
            // header('location: '. BASEURL . '/supplier');
			// exit;		
        }
    }

    public function hapus($id){
        if( $this->model('SupplierModel')->delete('IdSupplier',$id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. BASEURL . '/supplier');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. BASEURL . '/supplier');
			exit;	
		}
    }

}