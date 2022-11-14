<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "UsuariosTrait.php";
require_once "LoginController.php";



class Examples extends CI_Controller {

	use UsuariosTrait;
	
	public function __construct()	{
		parent::__construct();
		$this->load->model('observaciones_model');
		$this->load->model('mujeres_lideres');
		$this->load->model('sas_activo_model');
		$this->load->model('bada_celulares_model');
		$this->load->model('tags_model');
		$this->load->model('accionar_tag_mogel');
		$this->load->model('tags_model');
		$filtros = $this->tags_model->get_tags_list();
		$_SESSION['filtros'] = $filtros;
		
	}

    public function _example_output($output = null)	{
		if ($this->verifySession()){
			$this->load->view('index/header');
			$this->load->view('index/styles');
			$this->load->view('index/navBar/navBarGrocery');
			$this->load->view('example.php',(array)$output);
			$this->load->view('index/footer');}
		else {
			$this->debe_iniciar_sesion();
		}
			
	}



}

?>