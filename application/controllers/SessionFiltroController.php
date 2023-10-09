<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once "UsuariosTrait.php";
require_once "LoginController.php";


class SessionFiltroController extends CI_Controller {

	use UsuariosTrait;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('observaciones_model');
		$this->load->model('mujeres_lideres');
		$this->load->model('sas_activo_model');
		$this->load->model('bada_celulares_model');
		
	}

	public function _example_output($output = null)
	{
		if ($this->verifySession()){
			$this->load->view('index/header');
			$this->load->view('index/navBar/navBarGrocery');
			$this->load->view('example.php',(array)$output);
			$this->load->view('index/footer');}
		else {
			$this->debe_iniciar_sesion();
		}
			
	}


    public function index()
	{
		
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
		
	}



    public function cuit_tag_filtro(){

        $crud = new grocery_CRUD;
		$crud->set_theme('bootstrap');
        $crud->set_language('spanish-uy');
        $crud->set_table('base_unificada_users');
        $crud->set_subject('Usuarios');

        $crud	->set_primary_key('cuit','cuit_filtro_tag');        
        $crud   ->set_relation_n_n('filtros','cuit_filtro_tag','tags','cuit','id_tag','nombre')
                ->set_relation_n_n('tablas','acceso_tabla','tablas','cuit','id_tabla','nombre')
				->set_relation_n_n('tag_principal','accionar_tag','tags','cuit','id_tag','nombre')
				->set_relation_n_n('vistas','acceso_vista','vistas','cuit','id_vista','nombre')
                ->fields('cuit','user_name','tipo_usuario','tag_principal','carga_masiva','tablas','vistas')
                ->columns('cuit','user_name','tipo_usuario','tag_principal','carga_masiva','tablas')
				->display_as('user_name','Nombre de Usuario')
				->display_as('tablas','Tablas que el usuario puede ver')
				->display_as('vistas','Vistas que el usuario puede ver')
				->display_as('tag_principal','Tags sobre los que pueda accionar el usuario')
				->unset_columns(array('password'))
				->unset_fields('password')
				;

        $crud   ->field_type('tipo_usuario','enum',array('SU','CREAT','UPDATE','VIEW'))
                ->field_type('carga_masiva','enum',array('SI','NO'))
				// ->field_type('tablas','set',array('TODAS','LIDERES','GABINETE','SECRETARIO','SUBSECRETARIO','PTES. COMUNAS','LEGISLADORES','JDG','DG','GO','SAS ACTIVOS',
								// 'USUARIOS BADA','AFILIADOS','MUJERES LIDERES','TODAS'))
								;
		
		
				//->callback_after_insert(array($this,'action_after_insert'))
				//->callback_after_delete(array($this,'action_after_delete'))
		;

        // $crud->callback_before_delete(array($this,'action_befor_delete'));
        // $crud->callback_after_insert(array($this, 'action_befor_insert'));
        // $crud->callback_before_update(array($this,'action_befor_update'));

			$crud	->add_action(	'Editar',  base_url.'assets/icons/datos_personales.png', 'usuarios/session/edit')
					;

        $output = $crud->render();
        $this->_example_output($output);

    }

	public function action_after_update($post_array, $primary_key){
		var_dump($post_array);
		var_dump($primary_key);

		unset($post_array['tablas']);
		var_dump($post_array);

		return $post_array;


	}

	public function editar($id){

			redirect("usuarios/session/edit/{$id}");


	}



}