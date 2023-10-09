<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "UsuariosTrait.php";


class UsuariosController extends CI_Controller  {

    use UsuariosTrait;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_model');
        $this->load->model('logs_model');
        $this->load->model('user_model');
        $this->load->model('filtros_session_model');
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
        $password = $this->input->post('password');
        $password =  password_hash( $_REQUEST['password'], PASSWORD_BCRYPT);


        $respuesta = $this->user_model->update_user_data($cuit,$password);

        if ($respuesta == 1){
            $data['mensaje'] = "Cambio de contraseña exitosa";
            $this->load->view('index/header');
            $this->load->view('index/navBar/navBarGrocery');
            $this->load->view('registro/datos_acceso', $data);
            $this->load->view('index/footer');

        } else {
            $data['error'] = "No se pudocambiar la contraseña";
            $this->load->view('index/header');
            $this->load->view('index/navBar/navBarGrocery');
            $this->load->view('registro/datos_acceso', $data);
            $this->load->view('index/footer');

        }
    }


}