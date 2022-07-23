<?php
defined('BASEPATH') OR exit('No direct script access allowed');


trait UsuariosTrait   {

    public function __constructor(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }


    public function verifySession(){
        
        return isset($this->session->user_name);
        
    }

    public function debe_iniciar_sesion(){
		$data = [ 'error' => 'Debe inicar sesion para poder continuar'];
			$this->load->view('index/header');
			$this->load->view('index/navBar/navBar');
			$this->load->view('login/login', $data);
			$this->load->view('index/footer');
	}

}