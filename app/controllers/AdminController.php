<?php

class AdminController extends BaseController{

    /**
     * 
     */
    public function index(){
        $data['title'] = 'Halaman Admin';
        $data['role'] = $_SESSION['role'];
        $data['controllerName'] = 'admin';
        
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