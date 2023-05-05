<?php

class LoginController extends BaseController{
    
    public function index(){
        $data['title'] = 'Login Page';
        $this->view("Login", $data);
    }
    
    /**
     * This method is to receive model request
     */
    public function process() {
        if($row = $this->model('LoginModel')->checkCredentialUser($_POST) > 0 ) {
            $_SESSION['userId'] = $row['IdPengguna'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['firstName'] = $row['NamaDepan'];
            $_SESSION['lastName'] = $row['NamaBelakang'];
            $_SESSION['idAkses'] = $row['IdAkses'];; 
            $_SESSION['role'] = $row['Role'];; 
            $_SESSION['loginStatus'] = 'login'; 
            $_SESSION['isLogin'] = true; 
            
            header('location: '. BASEURL . '/admin');
        } else {
            Flasher::setFlash('Username / Password','salah.','danger');
            header('location: '. BASEURL . '/login');
            exit;	
        }
    }
}