<?php

class LoginController extends BaseController{
    
    public function __construct() {
        // apabila user sudah login, user tidak boleh mengakses halaman login
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin']) {
            
            // user akan dialihkan ke halaman dashboard tiap role
            if(isset($_SESSION['role'])) {
                $role = $_SESSION['role'];
                $redirectUrl = BASEURL . '/' . $role;
            } else {
                $redirectUrl = BASEURL;
            }
            
            header('location: '. $redirectUrl);
            exit;
        }    
    }

    public function index(){
        $data['title'] = 'Login Page';
        $this->view("Login", $data);
    }
    
    /**
     * This method is to receive model request
     */
    public function process() {
        $data = $this->model('LoginModel')->checkCredentialUser($_POST);
        if(!empty($data)) {
            $_SESSION['userId'] = $data['IdPengguna'];
            $_SESSION['username'] = $data['Username'];
            $_SESSION['firstName'] = $data['NamaDepan'];
            $_SESSION['lastName'] = $data['NamaBelakang'];
            $_SESSION['idAkses'] = $data['IdAkses'];; 
            $_SESSION['role'] = $data['Role'];; 
            $_SESSION['loginStatus'] = 'login'; 
            $_SESSION['isLogin'] = true; 
            
            header('location: '. BASEURL . '/admin');
        } else {
            Flasher::setMessage('Username / Password','salah.','danger');
            header('location: '. BASEURL . '/login');
            exit;	
        }
    }
}