<?php

class HomeController extends BaseController{
    
    public function __construct(){}

    /**
     * 
     */
    public function index(){
        $this->view('Dashboard');
    }

}