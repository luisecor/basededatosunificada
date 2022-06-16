<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    

	public function index()
	{
        $this->load->view('index/header');
        $this->load->view('index/navBar/navBar');
        $this->load->view('login/login');
        $this->load->view('index/footer');
        
	}

    public function confirm(){
        echo "ENTRASTE";
    }

    public function otra(){
        $this->load->view('index/header');
        // $this->load->view('index/navBar/navBar');
        // $this->load->view('login/login');
        $this->load->view('index/footer'); 
    }
}
