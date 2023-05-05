<?php

class LogoutController extends BaseController {
	
    public function index(){
        session_start();
		session_destroy();
		header('location: '. BASEURL . '/home');
	}

}