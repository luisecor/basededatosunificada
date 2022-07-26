<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "UsuariosTrait.php";


class UsuariosController extends CI_Controller  {

    use UsuariosTrait;

    public function __constructor(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }


    public function datos_ingreso(){

        if (!$this->verifySession()){
			return $this->debe_iniciar_sesion();
		}
		else {
            $this->load->view('index/header');
            $this->load->view('index/navBar/navBarGrocery');
            $this->load->view('registro/datos_acceso');
            $this->load->view('index/footer');
        }
    }

    public function verificarCambios(){
        $cuit = $this->session->cuit;
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');

        //password_hash( $_REQUEST['password'], PASSWORD_BCRYPT)

        var_dump($user_name);
        echo "<br>";
        var_dump($password);
    }


}