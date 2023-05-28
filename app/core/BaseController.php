<?php 
/**
 * This class is the base controller of this projects
 */
class BaseController {

    public function __construct(){	
        
        // // jika user belum login, user hanya bisa mengakses halaman login dan dashboard
        // if (session_status() == PHP_SESSION_NONE || !isset($_SESSION['isLogin']) || !$_SESSION['isLogin']) {
        //     // session belum ada atau variabel 'isLogin' belum didefinisikan di dalam session
        //     header('location: '. BASEURL . '/login');
        //     exit;
        // }
        
    }
    
    public function view($view, $data = [])
    {
        require_once PROJECT_URL . '/app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once PROJECT_URL . '/app/models/' . $model . '.php';
        return new $model;
    }
}