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

    public function error_($base){
        $this->load->view('index/header');
			$this->load->view('index/navBar/navBar');
			show_error("El cuit solicitado no se encuentra en la base de datos de {$base}",404,"CUIT no encontrado en la base de datos {$base}");
			$this->load->view('index/footer');

        

    }

    public function sin_acceso_tag_principal(){
        // Sin acceso al tag principal
        $tabla = $this->session->flashdata('table');
        if ($tabla !== "muejeres_lideres")
            $tabla = "examples/tabla_{$tabla}";
        else
            $tabla = "examples/{$tabla}";

            $data = [
                'heading' => "Sin acceso",
                'message' => "No tiene acceso para modificar el registro soliciado" ,
                'volver' => $tabla

            ];
            $this->load->view('index/header');
			$this->load->view('index/navBar/navBarGrocery');
            $this->load->view('errors/html/error_general',$data);
			//show_error("No tiene acceso para modificar el registro solicitado",500,"No tiene acceso para modificar el registro solicitado");
			$this->load->view('index/footer');


    }

}